<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Partie Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <?php 
  define("RACINE_SITE","/Facturation/");

  $rootPath = $_SERVER['DOCUMENT_ROOT'].'/Facturation/';
  
  
  ?> 
         <link rel="stylesheet" href="<?php echo RACINE_SITE . 'views/includes/style.css' ?>">


       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- CSS personnalisé -->
  <style>
 
    body {
      padding-top: 20px;
    }
    .card {
      width: 300px;
      margin: 20px;
    }
    .card-content p {
      font-size: 1.2em;
      margin-bottom: 10px;
    }
    .card-action {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
    }
    .card-action a {
      display: flex;
      align-items: center;
      color: #2196F3;
    }
    .card-action a:hover {
      text-decoration: underline;
    }
    .card-action a i {
      margin-right: 5px;
    }
    
  </style>   

</head>

<body>
  <?php   include $rootPath.'views/includes/navbar.php'; 
?>
      <!-- Navbar -->
    <!-- Main content -->
    <div class="container">   
    </div>
 <br>
 <br>
 <br>
    
<!-------*******************dasbord************************************************--->
<div class="container">
  <div class="row">
    <div class="col s12 m4">
      <div class="card blue">
        <div class="card-content white-text">
          <span class="card-title">
            <i class="material-icons icon">people</i>
            Nombre d'utilisateurs
          </span>
          <p>Total :
            <?php
            $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

            include_once($rootPath . '/models/User.php');
            include_once($rootPath . '/controllers/UserController.php');

            try {
              $userctr = new UserController();
              $res = $userctr->nbUtilisateur();
              if ($res == true) {
                echo $res; // Affichage du nombre total d'utilisateurs
              }
            } catch (Exception $e) {
              echo "Erreur : " . $e->getMessage();
            }
            ?>
          </p>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card green">
        <div class="card-content white-text">
          <span class="card-title">
            <i class="material-icons icon">attach_money</i>
            Utilisateurs payants
          </span>
          <p>total: 
          <?php
            $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

            include_once($rootPath . '/models/facture.php');
            include_once($rootPath . '/controllers/factureController.php');

            try {
                $factCtr = new factureController();
                $res = $factCtr->numberpaye();
                if ($res ==true) {
                    echo $res; 
                }
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>
          </p>
        </div>
        <div class="card-action">
          <a href="<?php echo RACINE_SITE; ?>views/users/listeUserpaye.php">
            <i class="material-icons">arrow_forward</i> Lien vers Page 2
          </a>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card red">
        <div class="card-content white-text">
          <span class="card-title">
            <i class="material-icons icon">money_off</i>
            Utilisateurs non payants
          </span>
          <p>total:
          <?php
            $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
            include_once($rootPath . '/models/facture.php');
            include_once($rootPath . '/controllers/factureController.php');

            try {
                $factCtr = new factureController();
                $res = $factCtr->numberNonpaye();
                if ($res ==true) {
                    echo $res; 
                }
            } catch (Exception $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>

          </p>
        </div>
        <div class="card-action">
          <a href="<?php echo RACINE_SITE; ?>views/users/listeUserNonpaye.php">
            <i class="material-icons">arrow_forward</i> Lien vers Page 2
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Add your custom scripts here -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Materialize components if needed
        });
    </script>
</body>

</html>
