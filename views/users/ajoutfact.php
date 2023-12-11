<!-- <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Formulaire Utilisateur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';


?>

<body>
    <div class="container">
        <h2>Formulaire Utilisateur</h2>
        <form action="ajoutfact_action.php" method="post">
            

            ttttttttttttttttttttttttttttttttttttttt

            <div class="input-field col s12">
                <select>
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>  <?php
                                                            include_once($rootPath . 'models/User.php');
                                                            include_once($rootPath . 'controllers/UserController.php');
                                                            $u = new UserController();
                                                            $res = $u->liste($u);

                                                            foreach ($res as $row) {
                                                                $id = $row['id'];
                                                                $name = $row['name'];

                                                                echo '<option  value="' . $id . '">' . $name . '</option>';
                                                            }

                                                            ?>
                </select>
                <label>Materialize Select</label>
            </div>
            

            <div class="input-field">
                <input type="text" name="netpaid">
                <label for="netpaid">Net_paid</label>
            </div>
            <div class="input-field">
                <input type="date" name="date1">
                <label for="date1">DateStart</label>
            </div>
            <div class="input-field">
                <input type="date" name="date2">
                <label for="date2">DateFin</label>
            </div>
            <div class="input-field">
                <input type="date" name="date3">
                <label for="date3">DatePaid</label>
            </div>
            <div class="input-field">
                <input type="text" name="paid">
                <label for="paid">Paid</label>
            </div>
            <div class="input-field">
                <input type="text" name="type">
                <label for="type">type</label>
            </div>

            <button class="btn waves-effect waves-light" type="submit" name="action">Envoyer</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });

    </script>
</body>

</html> -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Ajout - Facture d'Électricité</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>

<?php 
  
  $rootPath = $_SERVER['DOCUMENT_ROOT'].'/Facturation/';
  
  include $rootPath.'views/includes/navbar.php'; 
  
  ?> <br> <br>
    <div class="container">
        <h2>Ajout- Facture d'Électricité</h2>
        <form action="ajoutfact_action.php" method="post">
            <?php

            if (isset($_GET['success'])) {
                echo '<p style="color: green;">' . ' Opération effectuée avec succès'. '</p>';
            } elseif (isset($_GET['error'])) {
                echo '<p style="color: red;">' . 'Echec de l\'opération ! Merci de réessayer ultérieurement.' . '</p>';
            }
            ?>

            
            <div class="input-field col s12">
                <select name="user_id">
                    <option value="" disabled selected>Choose your option</option>
                    <?php
                    include_once($rootPath . 'models/User.php');
                    include_once($rootPath . 'controllers/UserController.php');
                    $u = new UserController();
                    $res = $u->liste($u);

                    foreach ($res as $row) {
                        $id = $row['id'];
                        $name = $row['name'];

                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>
                <label>Users</label>
            </div>

            
            <div class="input-field">
                <input type="text" name="netpaid">
                <label for="netpaid">Montant</label>
            </div>

            <div class="input-field">
                <input type="date" name="date1">
                <label for="date1">Date de début de la facture </label>
            </div>
            <div class="input-field">
                <input type="date" name="date2">
                <label for="date2">Date de fin de la facture</label>
            </div>


            <div class="input-field">
                <select name="type">
                    <option value="0"> choose type de facture</option>
                    <option value="Facture estimative">Facture estimative</option>
                    <option value="Facture réelle">Facture réelle</option>

                </select>
                <label for="type">Type de Facture</label>
            </div>
            <!-- ... -->

            <button class="btn waves-effect waves-light" type="submit" name="action">Enregistrer la Facture</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>

</html>