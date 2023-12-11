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

    $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
    require_once($rootPath . '/controllers/factureController.php');
    include $rootPath . 'views/includes/navbar.php';
    $userfact = new factureController();
    $res = $userfact->getFacture($_GET['id']);
   
    ?>
    <br> <br>
    <div class="container">
    <br> <br>
    <h4>Paiement  facture Numéro <?php echo $res['id']; ?> : <?php echo $res['type']; ?></h4>
    <br> 
    <form action="payer.php" method="post">
    <?php
    if (isset($_GET['success'])) {
        echo '<p style="color: green;">' . htmlspecialchars('Opération effectuée avec succès') . '</p>';
    } elseif (isset($_GET['error'])) {
        echo '<p style="color: red;">' . 'Echec de l\'opération ! Merci de réessayer ultérieurement.' . '</p>';
    }
    ?>

    <input type="hidden" id="id" name="id" value="<?php echo ($_GET['id']); ?>" required>
    <input type="hidden" id="iduser" name="iduser" value="<?php echo ($_GET['iduser']); ?>" required>

    <div class="input-field">
        <input type="text" id="montant" name="montant" value="<?php echo ($res['net_paye']); ?>" disabled>
        <label for="montant">Montant</label>
    </div>

    
    
    <div class="input-field">
        <input type="text" id="rib" name="rib" value="ghj" required>
        <label for="rib">RIB</label>
    </div>

   
   
    <button class="btn waves-effect waves-light" type="submit" <?php if ($res['paid'] == 1) echo 'disabled'; ?> >Enregistrer</button>
</form>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>