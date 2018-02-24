<?php 
    session_start();
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
        <?php if (isset($_SESSION['user'])) {
            echo "Welcome " . $_SESSION['user']['username'];
        } ?>
        <div class='container'>
            Admin options
        	<div class="separator">
        		<a href="/php/admin/team/list.php" class=''>List of teams registered to tournaments</a>
        	</div>
        	<div class="separator">
        		<a href="/php/admin/tournament/list.php" class=''>List of tournaments</a>
        	</div>
        	<div class="separator">
        		<a href="/php/admin/tournament/register.php" class=''>Register a new tournament</a>
        	</div>
            <hr>
            User Options
            <div class="separator">
                <a href="register.php">Register team to a tournament</a>
            </div>
            <div class="separator">
                <a href="">create new team</a>
            </div>
        </div>
        <footer>
            <a href="../auth/logout.php">Logout</a>
        </footer>
    </body>
</html>
