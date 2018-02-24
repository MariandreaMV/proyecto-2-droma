<?php 
    session_start();
    if (!$_SESSION["user"]) {
        header("location:auth/login.php");
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>List of tournaments</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <?php if (isset($_SESSION['user'])) {
            echo "Welcome " . $_SESSION['user']['username'];
        } ?>
        <div class="container">
            <div class="separator">
                <a href="register.php">Register team to a tournament</a>
            </div>
            <div class="separator">
                <a href="">create new team</a>
            </div>
        </div>
        <footer>
            <a href="/php/auth/logout.php">Logout</a>
        </footer>
    </body>
</html>