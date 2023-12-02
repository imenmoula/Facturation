<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Table with Actions - Materialize</title>
  <!-- Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Materialize JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <style>
    /* Add custom styles if needed */
    .form-with-button {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.right-aligned {
  margin-left: auto; /* Moves the button to the right */
}
/* Custom styles for buttons */
.custom-btn {
    padding: 1 12px; /* Adjust the padding as needed */
    margin-right: 9px; /* Adds space between buttons */
}

/* Custom styles for small icons */
.small-icon {
    font-size: 16px; /* Adjust the font-size of the icons */
    margin-right: 4px; /* Adds space between icon and text */
}


  </style>
</head>
<body>

  <!-- Navbar -->
  <?php 
  
  $rootPath = $_SERVER['DOCUMENT_ROOT'].'/Facturation/';
  
  include $rootPath.'views/includes/navbar.php'; 
  
  ?>

<div class="container">
  <h4>Liste des client</h4>
  <form  method='post' class="form-with-button">
  <div class="input-field">
    <i href='recherche.php?id=<?php echo $row['id']; ?>' class='material-icons prefix'>search</i>
    <input type='text' name='search'>
    <label for="search">Search</label>
  </div>

  <div class="right-aligned">
    <a href='inscription.php?id=<?php echo $row['id']; ?>' class='waves-effect waves-light btn'>
      <i class='material-icons left'>add</i>Ajout
    </a>
  </div>
</form>
  <!--*********php */-------------------------------------------------------------------------------->
  <?php
  $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

  include_once($rootPath . '/models/User.php');
  include_once($rootPath . '/controllers/UserController.php');
  $u = new UserController();
  $res = $u->liste($u);
  echo '<table class="striped">';
  echo "<thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Is_admin</th>
            <th>Adresse</th>
            <th>Phone</th>
            <th>Rib</th>
            <th>Cin</th>
            <th>Ville</th>
            <th>Action</th>
          </tr>
        </thead>";
  echo '<tbody>';

  if (is_array($res) || is_object($res)){
    foreach ($res as $row) {
      echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['name']}</td>
              <td>{$row['email']}</td>
              <td>{$row['password']}</td>
              <td>{$row['is_admin']}</td>
              <td>{$row['adresse']}</td>
              <td>{$row['phone']}</td>
              <td>{$row['rib']}</td>
              <td>{$row['cin']}</td>
              <td>{$row['ville']}</td>
              <td>
            
           
              <div class='row'>
                  <div class='col s4'>
                      <a href='modif.php?id={$row['id']}' class='waves-effect waves-light btn-small'>
                          <i class='material-icons left small-icon'>edit</i>Modifier
                      </a>
                  </div>
                <div class='col s4'>
                              <a href='supp.php?id={$row['id0']}' class='waves-effect waves-light btn-small red'>
                                  <i class='material-icons  small-icon left'>delete</i>Supprimer
                              </a>
                </div>
              <div class='col s4'>
                  <a href='consulte.php?id={$row['id']}' class='waves-effect waves-light btn-small'>
                      <i class='material-icons  left small-icon'>visibility</i>Consulter
                  </a>
              </div>
</div>


              </td>
            </tr>";
    }
  }
  
  echo '</tbody>';
  echo '</table>';
?>

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

</body>
</html>

