<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Votre Application de Paiement en Ligne</title>
    <!-- Inclure les fichiers CSS de Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Styles CSS personnalisés -->
    <style>
        /* Ajoutez vos styles personnalisés ici */
    </style>
</head>

<body>
<?php define("RACINE_SITE","/Facturation/"); ?>

    <div class="container">
        <h1>Application de Paiement en Ligne</h1>
        <div class="row">
            <div class="col s12 m6">
                <img src="<?php echo RACINE_SITE; ?>views/includes/img/login.png" alt="Image de facturation" class="responsive-img">
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

    <!-- Inclure les fichiers JavaScript de Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
