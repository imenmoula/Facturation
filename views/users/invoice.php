<!DOCTYPE html>
<html lang="en">
<?php define("RACINE_SITE", "/Facturation/");
?>

<head>
  <meta charset="UTF-8">
  <title>Users</title>
  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <?php

  $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';


  ?>
  <link rel="stylesheet" href="<?php echo RACINE_SITE . 'views/includes/style.css' ?>">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Materialize JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <?php

  $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

  include $rootPath . 'views/includes/navbar.php';

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
    }
  </style>
</head>

<body>

  <!-- Navbar -->

  <br> <br>
  <div class="container" style="display: block !important;">
    <h4>Liste des Facture <?php echo $_SESSION['name']; ?></h4>
    <form method='post' class="form-with-button">
      <div class="input-field">


        <form action="#" method="post">
          <i class='material-icons prefix'>search</i>

          <label for="client_number">Enter the number of clients:</label>

          <input type="text" id="search" name="search">
          <button type="submit">recherche</button>
        </form>
      </div>


      <?php if ($is_admin) { ?>
      <div class="right-aligned">
        <a href="ajoutfact.php" class='waves-effect waves-light btn'>
          <i class='material-icons left'>add</i>Ajout
        </a>
      </div>
      <?php } ?>
    </form>
    <!--*********php */-------------------------------------------------------------------------------->
    <?php
    $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

    include_once($rootPath . '/models/User.php');
    include_once($rootPath . '/controllers/factureController.php');
    $fact = new factureController();
    $res = $fact->liste($fact);
    echo '<table class="striped">';
    echo "<thead>
    <tr>
        <th>Id</th>
        <th>User</th>
        <th>Montant</th>
        <th>Datedebut</th>
        <th>Datefin</th>
        <th>Type</th>
        <th>état de paiement</th>
        <th>Consulter</th>
        <th>Paiement</th>";

        if ($is_admin) {
        echo "<th>Modifier</th>
              <th>Supprimer</th>";
        }

echo "</tr>
  </thead>";
echo "<tbody>";

    if (is_array($res) || is_object($res)) {
        foreach ($res as $row) {
          
          
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['iduser']}</td>
                  <td>{$row['net_paye']}</td>
                  <td>{$row['dateecheance']}</td>
                  <td>{$row['dateemission']}</td>
                  <td>{$row['type']}</td>
                  <td>";
          
          if ($row['paid'] == 1) {
              echo "<p style='color: green'>Payée</p>";
          } else {
              echo "<p style='color: red'>Non payée</p>";
          }
          
          echo "</td>
                  <td>
                      <a href='consulteclient.php?id={$row['id']}' target='_blank' class='waves-effect waves-light btn-small'>
                      <i class='material-icons small-icon'>picture_as_pdf</i>Consulter PDF
                      </a>
                  </td>
                  <td>
                      <a href='paiment.php?id={$row['id']}' class='waves-effect waves-light btn-small yellow modal-trigger'>
                          <i class='material-icons small-icon'>attach_money</i>Payer
                      </a>
                  </td>
              </tr>";
          

      
          if ($is_admin) {
              echo "<td>
                        <a href='modifFact.php?id={$row['id']}' class='waves-effect waves-light btn-small'>
                            <i class='material-icons small-icon'>edit</i>Modifier
                        </a>
                    </td>
                    <td>
                        <a href='#confirmationModal' data-id='{$row['id']}' class='waves-effect waves-light btn-small red modal-trigger'>
                            <i class='material-icons small-icon'>delete</i>Supprimer
                        </a>
                    </td>";
          }
      
          echo "</tr>";
      }
      
    }

    echo '</tbody>';
    echo '</table>';


    ?>

    <!--***********************************************************------------------------->
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
      // Display a confirmation dialog
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

</body>

</html>