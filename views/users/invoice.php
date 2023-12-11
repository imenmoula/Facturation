<!DOCTYPE html>
<html lang="en">
<?php define("RACINE_SITE", "/Facturation/");
?>

<head>
  <meta charset="UTF-8">
  <title>Users</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <?php

  $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

  ?>
  <link rel="stylesheet" href="<?php echo RACINE_SITE . 'views/includes/style.css' ?>">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <?php

  $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

  include $rootPath . 'views/includes/navbar.php';


    include_once($rootPath . '/models/User.php');
    include_once($rootPath . '/controllers/factureController.php');
    $fact = new factureController();
    $res = $fact->liste($fact);

  ?>

  <style>
    .form-with-button {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .right-aligned {
      margin-left: auto;
    }

    .custom-btn {
      padding: 1 12px;
      margin-right: 9px;
    }

    .small-icon {
      font-size: 16px;
      margin-right: 4px;
      vertical-align: middle;

    }
   
  </style>
  </style>
</head>

<body>

  <!-- Navbar -->

  <br> <br>
  <div class="container" style="display: block !important;">
    <h4>Liste des Facture <?php echo $_SESSION['name']; ?></h4>

<br> 


    

    <br>
    <form method='post' class="form-with-button">


      <?php if ($is_admin) { ?>
        <div class="right-aligned">
          <a href="ajoutfact.php" class='waves-effect waves-light btn'>
            <i class='material-icons left'>add</i>Ajout
          </a>
        </div>
      <?php } ?>
    </form>
     
  <div class="table-responsive">
    <table class="striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>User</th>
          <th>Nom de User</th>
          <th>Montant</th>
          <th>Datedebut</th>
          <th>Datefin</th>
          <th>Type</th>
          <th>état de paiement</th>
          <th>Consulter</th>
          <?php if ($is_admin == 0): ?>
          <th>Paiement</th>
            <?php endif; ?>
          <?php if ($is_admin): ?>
            <th>Modifier</th>
            <th>Supprimer</th>
          <?php endif; ?>
        </tr>
      </thead>
      <tbody>
        <?php
        if (is_array($res) || is_object($res)) {
          foreach ($res as $row) {
            ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= $row['iduser'] ?></td>
              <td><?= $row['name'] ?></td>
              <td><?= $row['net_paye'] ?></td>
              <td><?= $row['dateecheance'] ?></td>
              <td><?= $row['dateemission'] ?></td>
              <td><?= $row['type'] ?></td>
              <td>
                <?php if ($row['paid'] == 1): ?>
                  <p style='color: green'>Payée</p>
                <?php else: ?>
                  <p style='color: red'>Non payée</p>
                <?php endif; ?>
              </td>
              <td>
                <a href='consulteclient.php?id=<?= $row['id'] ?>' target='_blank' class='btn btn-primary btn-sm blue'>
                  <i class='material-icons small-icon'>picture_as_pdf</i>Consulter
                </a>
              </td>
              <?php if ($is_admin == 0): ?>
              <td>
                <a href='paiment.php?id=<?= $row['id'] ?>' class='btn btn-warning btn-sm yellow'>
                  <i class='material-icons small-icon'>attach_money</i>Payer
                </a>
              </td>
              <?php endif;?>
              <?php if ($is_admin): ?>
                <td>
                  <a href='modifFact.php?id=<?= $row['id'] ?>' class='btn btn-info btn-sm green'>
                    <i class='material-icons small-icon'>edit</i>Modifier
                  </a>
                </td>
                <td>
                  <a href='#confirmationModal' data-id='<?= $row['id'] ?>' class='btn btn-danger btn-sm modal-trigger red'>
                    <i class='material-icons small-icon'>delete</i>Supprimer
                  </a>
                </td>
              <?php endif; ?>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
  <div id="confirmationModal" class="modal">
    <div class="modal-content">
      <h4>Confirmation</h4>
      <p>Êtes-vous sûr de vouloir supprimer cet enregistrement ?</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Annuler</a>
      <a id="confirmDeleteBtn" href="#" class="modal-close waves-effect waves-red btn-flat">Supprimer</a>
    </div>
  </div>

  <footer>
    <p>&copy; 2023 Votre Application de Paiement en Ligne. Tous droits réservés.</p>
  </footer>

  <script>
    function confirmDelete(id) {
      if (confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) {
        window.location.href = 'suppfact.php?id=' + id;
      } else {
        location.reload();
      }
    }
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
      const modalInstances = M.Modal.init(document.querySelectorAll('.modal'));

      const anchors = document.querySelectorAll('.modal-trigger');
      anchors.forEach(anchor => {
        anchor.addEventListener('click', function() {
          const id = this.getAttribute('data-id');
          confirmDeleteBtn.setAttribute('href', `suppfact.php?id=${id}`);
        });
      });
    });
  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


</body>

</html>