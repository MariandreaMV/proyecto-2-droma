<?php 
    session_start();
    include_once "config/config.php";

    if (!$_SESSION["user"]) {
        header("location:auth/login.php");

    }

    if (isset($_POST["register"])) {
        
    }


    function tournament_list(){
        echo  '<option value="0"></option>';
        $pdo = Database::getConnection();
        $sql ="SELECT * FROM tournaments";
        $query = $pdo->prepare($sql);
        $query->execute();

        while($torneo=$query->fetch(PDO::FETCH_ASSOC))
           echo '<option value="'.$torneo['name'].'">'.$torneo['name'].'</option>';
    }


    




?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register Tournament</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <div class="container">
        	<form class=''>
        		<fieldset class='content'>
        			<legend>Tournament register</legend>
        			<div class="separator">
        				<label for='tournament'>Select tournament: </label>
        				<select id='tournament'>
                            <?php 
                                tournament_list();
                             ?>
        				</select>
        			</div>
        			<div class="separator">
        				<label for=''>Number of participants: </label>
        				<input type='number' min='1' required>
        			</div>
        			<div class="separator">
        				<label for='category'>Category: </label>
        				<select id='category'>
        					<option>Beginner</option>
        					<option>Amateur</option>
        					<option>Professional</option>
        				</select>
        			</div>
        			<input type="submit" name="register" value="register">
        		</fieldset>
        	</form>
        </div>
    </body>
</html>