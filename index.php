<?php 
	session_start();
	if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['status'] == 1) {
            header("location:/php/admin/index.php");
        } else {
            header("location:/php/index.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="/css/main.css" />
        <title>SPORT TOURNAMENT SYSTEM</title>
    </head>
    <body> 
        <div id="header">
            <nav>
                <ul>
                    <li><a href="/php/auth/register.php">Sign up</a></li>
                    <li><a href="/php/auth/login.php">Sign in</a></li>
                </ul>
             </nav>   
            <h1>SPORTS TOURNAMENTS</h1>
        </div>    
    </body>
</html>
