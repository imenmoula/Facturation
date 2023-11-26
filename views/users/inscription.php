<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <!-- Inclure les fichiers CSS de Materialize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Styles CSS personnalisés -->
    <style>
        /* Ajoutez vos styles personnalisés ici */
    </style>
</head>

<body>
    <div class="container">
        <h2>Inscription</h2>
        <form action="inscrire.php" method="post">
            <div class="input-field">
                <input type="text" id="name" name="name" required>
                <label for="name">Nom complet</label>
            </div>
            <div class="input-field">
                <input type="email" id="email" name="email" required>
                <label for="email">Adresse e-mail</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" name="password" required>
                <label for="password">Mot de passe</label>
            </div>
            <div class="input-field">
                <input type="password" id="confirm_password" name="confirm_password" required>
                <label for="confirm_password">Confirmer le mot de passe</label>
            </div>
            <div class="input-field">
                <input type="text" id="adresse" name="adresse" required>
                <label for="adresse">Adresse</label>
            </div>
            <div class="input-field">
                <input type="text" id="phone" name="phone" required>
                <label for="phone">Téléphone</label>
            </div>
            <div class="input-field">
                <input type="text" id="rib" name="rib" required>
                <label for="rib">RIB</label>
            </div>
            <div class="input-field">
                <input type="text" id="cin" name="cin" required>
                <label for="cin">CIN</label>
            </div>
            <div class="input-field">
                <input type="text" id="ville" name="ville" required>
                <label for="ville">Ville</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit">S'inscrire</button>
        </form>
    </div>

    <!-- Inclure les fichiers JavaScript de Materialize -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
