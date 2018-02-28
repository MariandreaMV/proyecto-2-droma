<?php
    session_start();
    include_once "config/config.php";

    if (!$_SESSION["user"]) {
        header("location:auth/login.php");
    }

    function teamExist($team_id,$category) {
        $pdo = Database::getConnection();

        $query = $pdo->prepare("SELECT COUNT(id) FROM registers WHERE team_id = '$team_id' AND category='$category'");
        $query->bindValue(1, $team_id);
        try {
            $query->execute();
            $rows = $query->fetchColumn();
            if($rows >= 1){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    if (isset($_POST["register"])) {

        if (isset($_POST["tournament"]) && strlen($_POST["number"])>=1 && isset($_POST["team"]) > 0) {

            if (!teamExist($_POST['team'],$_POST['category'])) {

                $pdo = Database::getConnection();
                $sql = "INSERT INTO registers(tournament_id,team_id,n_participants,category) VALUES (:tournament,:team_id,:n_participants,:category)";
                $query = $pdo->prepare($sql);
                $result = $query->execute([
                    'tournament'=> $_POST['tournament'],
                    'team_id' => $_POST['team'],
                    'n_participants' => $_POST['number'],
                    'category' => $_POST['category']
                ]);
                $_SESSION['success'] = $result;
            } else {
                $_SESSION['failure'] = true;
            }
        } else {
            $_SESSION['result'] = false;
        }
    }

    function tournament_list(){

        echo  '<option disabled selected>Select an option</option>';
        $pdo = Database::getConnection();
        $sql ="SELECT * FROM tournaments";
        $query = $pdo->prepare($sql);
        $query->execute();

        while($torneo=$query->fetch(PDO::FETCH_ASSOC))
            if ($torneo['status']== 1)
                 echo '<option value="'.$torneo['id'].'">'.$torneo['name'].'</option>';
    }

    function team_list(){

        echo  '<option disabled selected>Select an option</option>';
        $pdo = Database::getConnection();
        $user_id = $_SESSION["user"]['id'];
        $sql ="SELECT teamname, id FROM teams WHERE user_id = '$user_id'";
        $query = $pdo->prepare($sql);
        $query->execute();

        while($team=$query->fetch(PDO::FETCH_ASSOC))
            echo '<option value="'.$team['id'].'">'.$team['teamname'].'</option>';
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
            <?php if (isset($_SESSION['success'])): ?>
                <div class="success">
                    Registered Successfully!!
                </div>
            <?php unset($_SESSION['success']); endif ?>
            <?php if (isset($_SESSION['failure'])): ?>
                <div class="failure">
                    Team already registered in this tournament
                </div>
            <?php unset($_SESSION['failure']); endif ?>
            <?php if (isset($_SESSION['result'])): ?>
                <div class="failure">
                    Incorrect values provided
                </div>
            <?php unset($_SESSION['result']); endif ?>
        	<form class='' method = 'post'>
        		<fieldset class='content'>
        			<legend>Tournament register</legend>
                    <div class="separator">
                        <label for='team'>Select team</label>
                        <select id='team' name = 'team'>
                            <?php
                                team_list();
                             ?>
                        </select>
                    </div>
        			<div class="separator">
        				<label for='tournament'>Select tournament</label>
        				<select id='tournament' name = 'tournament'>
                            <?php
                                tournament_list();
                             ?>
        				</select>
        			</div>
        			<div class="separator">
        				<label for=''>Number of participants</label>
        				<input type='number' min='1' name="number" required>
        			</div>
        			<div class="separator">
        				<label for='category'>Category</label>
        				<select id='category' name ='category'>
        					<option value="Beginner">Beginner</option>
        					<option value="Amateur">Amateur</option>
        					<option value="Professional" >Professional</option>
        				</select>
        			</div>
        			<input class='button btn-web' type="submit" name="register" value="register">
        		</fieldset>
        	</form>
            <div class="separator">
                <?php if (isset($_SESSION['admin'])):?>
                    <a class="button btn-web" href='/php/admin/index.php'>Back</a>
                <?php else: ?>
                    <a class="button btn-web" href='/php/index.php'>Back</a>
                <?php endif ?>
            </div>
        </div>
    </body>
</html>
