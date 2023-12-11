<!doctype html>

<html lang="fr">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="UTF-8">
<?php $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
define("RACINE_SITE", "/Facturation/");
?>


    <title>Modification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="<?php echo RACINE_SITE . 'views/includes/style.css' ?>">
    <style>
    </style>
</head>

<body>


    <!-- Navbar -->
    <?php

    require_once($rootPath . '/controllers/UserController.php');

    include $rootPath . 'views/includes/navbar.php';
    $userctr = new UserController();
    $res = $userctr->getUser($_GET['id']);
    

    ?>
    <br> <br>
    <div class="container">
        <h2>Modifier Client</h2>
        <form action="modification.php" method="post">
  <?php

        if (isset($_GET['success'])) {
        echo '<p style="color: green;">' . htmlspecialchars(' Opération effectuée avec succès'). '</p>';
    } elseif (isset($_GET['error'])) {
        echo '<p style="color: red;">' . 'Echec de l\'opération ! Merci de réessayer ultérieurement.'. '</p>';
    }
    ?>
    
            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>" required>

            <div class="input-field">
                <input type="text" id="name" name="name" value="<?php echo $res['name'] ?>" required>
                <label for="name">Nom complet</label>
            </div>
            <div class="input-field">
                <input type="email" id="email" name="email"value=" <?php echo $res['email'] ?>"  required>
                <label for="email">Adresse e-mail</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password"value="" required>
                <label for="password">Mot de passe</label>
            </div>
            <div class="input-field">
                <input type="password" id="confirm_password" name="confirm_password" value="" required>
                <label for="confirm_password">Confirmer le mot de passe</label>
            </div>
            <div class="input-field">
                <input type="text" id="adresse" name="adresse" value="<?php echo $res['adresse'] ?>" required>
                <label for="adresse">Adresse</label>
            </div>
            <div class="input-field">
                <input type="text" id="phone" name="phone" value="<?php echo $res['phone'] ?>" required>
                <label for="phone">Téléphone</label>
            </div>
            <div class="input-field">
                <input type="text" id="rib" name="rib"value=" <?php echo $res['rib'] ?>" required>
                <label for="rib">RIB</label>
            </div>
            <div class="input-field">
                <input type="text" id="cin" name="cin" value=" <?php echo $res['cin'] ?>" required>
                <label for="cin">CIN</label>
            </div>
            <div class="input-field">
                <input type="text" id="ville" name="ville"value=" <?php echo $res['ville'] ?> " required>
                <label for="ville">Ville</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit">Modif</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>