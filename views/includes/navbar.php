<?php 
define("RACINE_SITE","/Facturation/");



@session_start();
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
  ?>

<nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Facturation  <?php echo $_SESSION['name']; ?></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?php echo RACINE_SITE; ?>views/home.php">Accueil</a></li>

                <li><a href="<?php echo RACINE_SITE; ?>views/users/invoice.php">Liste des factures</a></li>

                <?php if ($is_admin) { ?>
               
                  <li><a href="<?php echo RACINE_SITE; ?>views/users/users.php">Liste des clients</a></li>

               <?php } ?>
                
                <li><a href="#">Déconnexion</a></li>
            </ul>
        </div>
</nav>