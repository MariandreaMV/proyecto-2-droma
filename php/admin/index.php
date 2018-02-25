<?php 
    session_start();
    include_once '../config/config.php';
    $pdo = Database::getConnection();
    if (!$_SESSION['admin'])
        header ("Location:../../../index.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin panel</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
      
    </head>
    <body>
        <div id ="admin">
             <?php if (isset($_SESSION['user'])) {
                echo "<h1>Welcome " . $_SESSION['user']['username']."</h1>";
            } ?>
            <div class='container' >
                <nav>
                    <h3> Admin options</h3>
                    <ul>
                        <li><a href="/php/admin/team/list.php">List of teams registered to tournaments</a></li>
                        <li><a href="/php/admin/tournament/list.php">List of tournaments</a></li>
                        <li><a href="/php/admin/tournament/register.php">Register a new tournament</a></li>
                    </ul>
                    <hr>
                    <h3>User Options</h3>
                    <ul>
                        <li> <a href="../register.php">Register team to a tournament</a></li>
                        <li><a href="">create new team</a></li>
                    </ul>
                 </nav>
             </div>  
            <footer>
                <a href="../auth/logout.php">Logout</a>
            </footer>
        </div>        
    </body>
</html>
