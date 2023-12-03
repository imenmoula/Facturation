<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Users</title>
  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo RACINE_SITE . 'views/includes/style.css' ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Materialize JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <?php

  $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

  include $rootPath . 'views/includes/navbar.php';

  ?>

  <style>
    /* Add custom styles if needed */
    .form-with-button {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .right-aligned {
      margin-left: auto;
      /* Moves the button to the right */
    }

    /* Custom styles for buttons */
    .custom-btn {
      padding: 1 12px;
      /* Adjust the padding as needed */
      margin-right: 9px;
      /* Adds space between buttons */
    }

    /* Custom styles for small icons */
    .small-icon {
      font-size: 16px;
      /* Adjust the font-size of the icons */
      margin-right: 4px;
      /* Adds space between icon and text */
    }
  </style>
</head>

<body>

  <!-- Navbar -->

  <br> <br>
  <div class="container">
    <h4>Liste des Facture</h4>
    <form method='post' class="form-with-button">
      <div class="input-field">


        <form action="#" method="post">
          <i class='material-icons prefix'>search</i>

          <label for="client_number">Enter the number of clients:</label>

          <input type="text" id="search" name="search">
          <button type="submit">recherche</button>
        </form>
      </div>



      <div class="right-aligned">
        <a href="ajoutfact.php" class='waves-effect waves-light btn'>
          <i class='material-icons left'>add</i>Ajout
        </a>
      </div>
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
            <th>Consulter</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>
        </thead>";
    echo '<tbody>';
    

    if (is_array($res) || is_object($res) ) {
      foreach ($res as $row) {
        echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['iduser']}</td>
              <td>{$row['net_paye']}</td>
              <td>{$row['dateecheance']}</td>
              <td>{$row['dateemission']}</td>
              <td>{$row['type']}</td>
              

              <td>
                  <a href=' #?id={$row['id']}' class='waves-effect waves-light btn-small'>
                      <i class='material-icons small-icon'>visibility</i>Consulter
                  </a>
          
              </td>
              <td>
            
           
              
               
                      <a href='modifFact.php?id={$row['id']}' class='waves-effect waves-light btn-small'>
                          <i class='material-icons small-icon'>edit</i>Modifier
                      </a>
               </td>
               <td>
                             

<a href='#confirmationModal' data-id='{$row['id']}' class='waves-effect waves-light btn-small red modal-trigger'>
    <i class='material-icons small-icon'>delete</i>Supprimer
</a>

               </td>
               
            </tr>";
      }
    }

    echo '</tbody>';
    echo '</table>';
    ?>

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
  <!-- <script>
  // JavaScript functions for actions
  function deleteData(id) {
    // Perform delete action
    console.log("Deleted item with ID: " + id);
  }

  function consultData(id) {
    // Perform consult action
    console.log("Consulted item with ID: " + id);
  }
</script> -->


  <!-- jQuery -->
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