<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accueil - Partie Admin</title>
    <!-- Add links to Materialize CSS files and your custom styles here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Add your custom styles here -->
    <style>
        /* Custom styles for the Navbar */
        nav {
            background-color: #2196F3; 
            /* Blue background color */
            position: fixed;
            width: 100%;
            z-index: 1000; 
           
        }
 


        /* Customize the brand-logo */
        .brand-logo {
            margin-left: 15px; /* Adjust the margin as needed */
        }
       
        
    </style>
</head>

<body>
      <!-- Navbar -->
  <?php 
  
  $rootPath = $_SERVER['DOCUMENT_ROOT'].'/Facturation/';
  
  include $rootPath.'views/includes/navbar.php'; 
  
  ?>
    

    <!-- Main content -->
    <div class="container">
        
    </div>

    <!-- Add links to Materialize JavaScript files and your custom scripts here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Add your custom scripts here -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Materialize components if needed
        });
    </script>
</body>

</html>
