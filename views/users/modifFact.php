<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <?php $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
    define("RACINE_SITE", "/Facturation/");
    ?>

    <title>Update - Facture d'Électricité</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo RACINE_SITE . 'views/includes/style.css' ?>">

</head>

<body>

    <?php

    $rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
    require_once($rootPath . '/controllers/factureController.php');
    include $rootPath . 'views/includes/navbar.php';
    $userfact = new factureController();
    $res = $userfact->getFacture($_GET['id']);

    ?>
    <br> <br>
    <div class="container">
        <h2>Update- Facture d'Électricité </h2>
        <form action="modificationFact.php" method="post">

            <?php

            if (isset($_GET['success'])) {
                echo '<p style="color: green;">' . ' Opération effectuée avec succès' . '</p>';
            } elseif (isset($_GET['error'])) {
                echo '<p style="color: red;">' . 'Echec de l\'opération ! Merci de réessayer ultérieurement.' . '</p>';
            }
            ?>
            <div class="input-field">
                <select name="user_id">
                    <option value="" disabled selected>Choose your option</option>

                    <?php
                    include_once($rootPath . 'models/User.php');
                    include_once($rootPath . 'controllers/UserController.php');
                    $u = new UserController();

                    $userList = $u->liste($u);

                    foreach ($userList as $row) {
                        $id = $row['id'];
                        $name = $row['name'];

                        echo '<option value="' . $id . '"';
                        if ($id == $res['id']) {
                            echo ' selected';
                        }
                        echo '>' . $name . '</option>';
                                                
                    }


                    ?>
                </select>
                <label>Users</label>
            </div>


            <div class="input-field ">
                <input type="text" name="netpaid" value="<?php echo $res['net_paye'] ?>">
                <label for="netpaid">Montant</label>
            </div>

            <div class="input-field">
                <input type="date" name="date1" value="<?php echo $res['dateecheance'] ?>">
                <label for="date1">Date de début de la facture </label>
            </div>

            <div class="input-field">
                <input type="date" name="date2" value="<?php echo $res['dateemission'] ?>">
                <label for="date2">Date de fin de la facture</label>
            </div>


            <div class="input-field">
                <select name="type" value="<?php echo $res['type'] ?>">
                    <option value="0"> choose type de facture</option>
                    <option value="Facture estimative" <?php if ($res['type'] === 'Facture estimative') echo 'selected'; ?>>Facture estimative</option>
                    <option value="Facture réelle" <?php if ($res['type'] === 'Facture réelle') echo 'selected'; ?>>Facture réelle</option>
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