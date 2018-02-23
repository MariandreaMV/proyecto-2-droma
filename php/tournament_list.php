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
        <div class="container">

        </div>
    </body>
</html>