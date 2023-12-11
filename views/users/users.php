<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Users</title>
  
  <?php

  $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

  include $rootPath . 'views/includes/head.php';

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
  <?php   include $rootPath . 'views/includes/navbar.php';
 ?>

  <br> <br>
  <div class="container">
    <h4>Liste des client</h4>

    <div class="row">
      <div class="col s12 m9">
        <a href='inscription.php' class='waves-effect waves-light btn'>
          <i class='material-icons left'>add</i>Ajout
        </a>
      </div>

      <div class="col s12 m3">
        <a href="#clientSearchModal" class="waves-effect waves-light btn modal-trigger">Recherche Client</a>

      </div>
    </div>

    




    <div id="clientSearchModal" class="modal">
      <div class="modal-content">
        <h4>Recherche de Client</h4>
        <form action="recherche.php" method="post">
          <div class="input-field">
            <input id="name" type="text" name="name">
            <label for="name">Nom du Client</label>
          </div>

          <div class="input-field">
            <input id="id" type="text" name="id">
            <label for="id">ID du Client</label>
          </div>

      </div>
      <div class="modal-footer">

        <button class="btn waves-effect waves-light green" type="submit" name="action">recherche</button>
        <button class="btn modal-close waves-effect waves-light red" type="reset">Fermer</button>

      </div>
      </form>
    </div>


    </form>
    <!--*********php */-------------------------------------------------------------------------------->
    <?php
    $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

    include_once($rootPath . '/models/User.php');
    include_once($rootPath . '/controllers/UserController.php');
    $u = new UserController();

    if (isset($_GET['success']) && isset($_GET['data'])) {

      $res = json_decode(stripslashes(urldecode($_GET['data'])));
    }else {
      $res = $u->liste($u);
    }

    echo '<table class="striped">';
    echo "<thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Is_admin</th>
            <th>Adresse</th>
            <th>Phone</th>
            <th>Rib</th>
            <th>Cin</th>
            <th>Ville</th>
            <th>Modifier</th>
            <th>Supprimer</th>
          </tr>
        </thead>";
    echo '<tbody>';

    if (is_array($res) || is_object($res)) {

      if (!is_array($res)) { 
        foreach ($res as $row) {
          echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['is_admin']}</td>
                <td>{$row['adresse']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['rib']}</td>
                <td>{$row['cin']}</td>
                <td>{$row['ville']}</td>
  
                
                <td>
                  <a href='modif.php?id={$row['id']}' class='waves-effect waves-light btn-small'>
                       <i class='material-icons small-icon'>edit</i>Modifier
                  </a>
                 </td>
                 <td>
                    <a href='supp.php?id={$row['id']}' class='waves-effect waves-light btn-small red'>
                     <i class='material-icons  small-icon'>delete</i>Supprimer
                     </a>
                 </td>
                 
              </tr>";
        }

      }else {
        foreach ($res as $row) {
          echo "<tr>
                <td>{$row->id}</td>
                <td>{$row->name}</td>
                <td>{$row->email}</td>
                <td>{$row->is_admin}</td>
                <td>{$row->adresse}</td>
                <td>{$row->phone}</td>
                <td>{$row->rib}</td>
                <td>{$row->cin}</td>
                <td>{$row->ville}</td>
  
                
                <td>
                  <a href='modif.php?id={$row->id}' class='waves-effect waves-light btn-small'>
                       <i class='material-icons small-icon'>edit</i>Modifier
                  </a>
                 </td>
                 <td>
                    <a href='supp.php?id={$row->id}' class='waves-effect waves-light btn-small red'>
                     <i class='material-icons  small-icon'>delete</i>Supprimer </a>
                 </td>
                 
              </tr>";
        }

      }
      
    }

    echo '</tbody>';
    echo '</table>';
    ?>

  </div>



  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const clientSearchInput = document.getElementById('clientSearchInput');
      const clientSearchResults = document.getElementById('clientSearchResults');

      const modalInstances = M.Modal.init(document.querySelectorAll('.modal'));
    });
  </script>

  
</body>

</html>