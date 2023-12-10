<?php
define("RACINE_SITE", "/Facturation/");



@session_start();
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
?>


<nav>
        <div class="nav-wrapper">
            <a href="<?php echo RACINE_SITE; ?>" class="brand-logo">Facturation</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
            <?php
        if ($_SESSION['id']) {
        ?>
          <li><a href="<?php echo RACINE_SITE; ?>views/home.php">Accueil</a></li>

          <li><a href="<?php echo RACINE_SITE; ?>views/users/invoice.php">Liste des factures</a></li>

          <?php if ($is_admin) { ?>

            <li><a href="<?php echo RACINE_SITE; ?>views/users/users.php">Liste des clients</a></li>

          <?php } ?>

          <li><a href="<?php echo RACINE_SITE; ?>views/deconnexion.php">Déconnexion</a></li>
        <?php } ?>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
    <?php
        if ($_SESSION['id']) {
        ?>
          <li><a href="<?php echo RACINE_SITE; ?>views/home.php">Accueil</a></li>

          <li><a href="<?php echo RACINE_SITE; ?>views/users/invoice.php">Liste des factures</a></li>

          <?php if ($is_admin) { ?>

            <li><a href="<?php echo RACINE_SITE; ?>views/users/users.php">Liste des clients</a></li>

          <?php } ?>

          <li><a href="<?php echo RACINE_SITE; ?>views/deconnexion.php">Déconnexion</a></li>
        <?php } ?>
        <!-- Ajoutez d'autres liens de menu selon vos besoins -->
    </ul>