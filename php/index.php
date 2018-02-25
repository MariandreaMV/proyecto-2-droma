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
        <link rel="stylesheet" type="text/css" href="/css/main.css">
    </head>
    <body>     
        <div id="admin">
            <footer>
                <a href="/php/auth/logout.php">Logout</a>
            </footer>
            <?php if (isset($_SESSION['user'])) {
            echo "<h1>Welcome " . $_SESSION['user']['username']."<h1>";
             } ?>
         </div>
         <div class="container" id="admin">
            <nav>
                <ul>
                    <li> <a href="register.php">Register team to a tournament</a></li>
                    <li><a href="">create new team</a></li>
                </ul>
            </nav>
        </div>
    </body>
</html>