<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Materialize CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Other styles or custom stylesheets -->
</head>

<body>
    <div class="container">


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




    <!-- Materialize JavaScript CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Other scripts -->
</body>

</html>
