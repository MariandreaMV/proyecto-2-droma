<?php 
	session_start();
	if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['status'] == 1) {
            header("location:/php/admin/index.php");
        } else {
            header("location:/php/tournament_register.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sport tournament system</title>
    </head>
    <body>
        <a href="/php/auth/login.php">Sign in</a>
        <a href="/php/auth/register.php">Sign up</a>
    </body>
</html>
