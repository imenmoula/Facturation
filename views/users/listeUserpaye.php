<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/models/facture.php');
include_once($rootPath . '/controllers/factureController.php');

$fact = new factureController();
$res = $fact->listepayant($fact);
define("RACINE_SITE","/Facturation/");

?>

<html>
<head>
  <title>Table Design</title>
  
  <link rel="stylesheet" href="<?php echo RACINE_SITE . 'views/includes/style.css' ?>">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <?php

  $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

  include $rootPath . 'views/includes/navbar.php';

  ?>

</head>
<body>

<div class="container">
  <h3>Liste payer</h3>

  <table class="highlight">
    <thead>
      <tr>
        <th>ID</th>
        <th>ID Utilisateur</th>
        <th>Date de Paiement</th>
        <th>Type</th>
        <th>Statut de Paiement</th>
      </tr>
    </thead>
    <tbody>
      <?php
   
      if (is_array($res) || is_object($res)) {
        foreach ($res as $row) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['iduser']}</td>
                  <td>{$row['datepaid']}</td>
                  <td>{$row['type']}</td>
                  <td>";

          
          if ($row['paid'] == 1 ) {
            echo "<a class='waves-effect waves-light btn yellow'><i class='material-icons left'>warning</i> Paid</a>";

          } 

          echo "</td></tr>";
          



        }
      }
    
      ?>
    </tbody>
  </table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>