<?php 
    include_once '../config/config.php';
    $pdo = Database::getConnection();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin panel</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <div class='container'>
        	<div class="separator">
        		<a href="/php/admin/list.php" class=''>List of teams registered to tournaments</a>
        	</div>
        	<div class="separator">
        		<a href="/php/admin/tournaments.php" class=''>List of tournaments available</a>
        	</div>
        	<div class="separator">
        		<a href="/php/admin/tournament_register.php" class=''>Register a new tournament</a>
        	</div>
        </div>
    </body>
</html>
