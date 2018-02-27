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
        <title>User panel</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
    </head>
    <body>
        <div id="admin">
            <?php if (isset($_SESSION['user'])): ?>
                <h1 class='user'>Welcome <?= $_SESSION['user']['username'] ?> <h1>
            <?php endif ?>
         </div>
         <div class="container" id="admin">
            <nav>
                <h3>User options</h3>
                <ul>
                    <li><a href="register.php">Register team to a tournament</a></li>
                    <li><a href="newteam.php">Create new team</a></li>
                </ul>
            </nav>
        </div>
        <footer class="logout">
            <a href="/php/auth/logout.php">Logout</a>
        </footer>
    </body>
</html>
