<?php 
define("RACINE_SITE","/Facturation/");



@session_start();
  ?>

<nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Facturation  <?php echo $_SESSION['name']; ?></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?php echo RACINE_SITE; ?>views/home.php">Accueil</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>views/users/invoice.php">Liste des factures</a></li>
                <li><a href="<?php echo RACINE_SITE; ?>views/users/users.php">Liste des clients</a></li>
                <li><a href="#">Déconnexion</a></li>
            </ul>
        </div>
</nav>