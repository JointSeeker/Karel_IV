<?php
session_start();

function nactiTridy($class) : void
{
    require("php/$class.php");
}
spl_autoload_register("nactiTridy");



mb_internal_encoding("UTF-8");

// Db::pripoj('185.129.138.54', 'f164073', 'cu9PgK2e', 'f164073');
Db::pripoj('localhost', 'root', '', 'karel_iv');
?>

<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $login = new Login();
        $login->getHeslo();
    } else {
        echo "Nevyplněno!";
    }
}

?>


<!DOCTYPE html>
<html lang="cs-cz">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <!-- formulář -->
    <div class="loginForm">
        <h2>Karel .IV</h2>
        <form action="<?= $_SERVER['PHP_SELF']?>" autocomplete="off" method="post">
            <input type="text" pattern="[A-Za-z]{3-20}" name="username" id="" placeholder="Uživatelské jméno"><br>
            <input type="password" name="password" id="button-margin" placeholder="Zadej heslo"><br>
            <input class="button" name="submit" type="submit" value="Přihlásit">
        </form>
    </div>


</body>
</html>