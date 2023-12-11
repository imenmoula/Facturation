<!DOCTYPE html>
<html lang="en">
<?php define("RACINE_SITE","/Facturation/");?>

<head>
    <meta charset="UTF-8">
    <title>Accueil - Votre Application de Paiement en Ligne</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo RACINE_SITE.'views/includes/style.css'?>">

</head>

<body>
<?php 
  
  $rootPath = $_SERVER['DOCUMENT_ROOT'].'/Facturation/';
  
  include $rootPath.'views/includes/navbar.php'; 
  
  ?>

    <div class="container_lx">
        <h4>Application de Paiement en Ligne</h4>
        <div class="row">
            <div class="col s12 m6">
                <img src="<?php echo RACINE_SITE; ?>views/includes/img/im1.png"  width="300" height="250"Image de facturation" class="responsive-img">
            </div>
            <div class="col s12 m6">
                <p>Description de votre application de paiement en ligne...</p>
                <p>Facile, sécurisé et pratique pour gérer vos factures en ligne.</p>
                <div>
                    <a href="views/login.php" class="waves-effect waves-light btn">Connexion</a>
                    <a href="views/users/inscription.php" class="waves-effect waves-light btn">Inscription</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <footer>
        <p>&copy; 2023 Votre Application de Paiement en Ligne. Tous droits réservés.</p>
</footer>


    
</body>

</html>
