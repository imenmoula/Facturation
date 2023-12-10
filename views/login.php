<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <?php define("RACINE_SITE","/Facturation/"); ?>

    <!-- Materialize CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo RACINE_SITE.'views/includes/style.css'?>">

    <!-- Custom styles -->
    <style>
        /* Style personnalisé pour l'image et le formulaire */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        .login-container {
            display: flex;
            width: 70%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 5px;
        }

        .login-image {
            flex: 1;
            background-image: url('<?php echo RACINE_SITE; ?>views/includes/img/login.png'); /* Remplacez par le chemin de votre image */
            background-size: cover;
        }

        .login-form {
            flex: 1;
            padding: 20px;
        }

        .login-form h2 {
            margin-bottom: 20px;
        }

        .input-field {
            margin-bottom: 20px;
        }
    </style>
</head>

<body >

<?php 
  
  $rootPath = $_SERVER['DOCUMENT_ROOT'].'/Facturation/';
  
  include $rootPath.'views/includes/navbar.php'; 
  
  ?>
    <div class="container">
        <div class="login-container">
            <div class="login-image"></div>
            <div class="login-form">
                <h2>Login</h2>
                <form action="login_test.php" method="post">
                    <?php
                        if (isset($_GET['erreur'])) {
                            echo '<p style="color: red;">' . htmlspecialchars($_GET['erreur']). '</p>';
                        }
                    ?>
                    <div class="input-field">
                        <input type="text" id="username" name="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <button class="btn waves-effect waves-light" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Materialize JavaScript CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <footer>
        <p>&copy; 2023 Votre Application de Paiement en Ligne. Tous droits réservés.</p>
</footer>


    <!-- Other scripts -->
</body>

</html>
