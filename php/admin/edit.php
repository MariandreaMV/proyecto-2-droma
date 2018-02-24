<?php 
    session_start();
    include_once '../config/config.php';
    if (!isset($_SESSION['user'])) {
        header("location:/php/auth/login.php");
    }

    if (isset($_POST['register'])) {
        if (isset($_POST["tournament"]) && strlen($_POST["number"])>=1 && isset($_POST["team"]) > 0) {
            $pdo = Database::getConnection();
            $id = $_GET['id'];
            $sql = "UPDATE registers SET tournament_id = :tournament, team_id = :team, " .
                "n_participants = :participants, category = :category WHERE id = '$id'";
            $query = $pdo->prepare($sql);
            $result = $query->execute([
                'tournament'=> $_POST['tournament'],
                'team' => $_POST['team'],
                'participants' => $_POST['number'],
                'category' => $_POST['category']
            ]);
            header("location:/php/admin/list.php");
        }
    }

    function tournament_list(){
        
        echo  '<option disabled selected>Select an option</option>';
        $pdo = Database::getConnection();
        $sql ="SELECT * FROM tournaments";
        $query = $pdo->prepare($sql);
        $query->execute();

        while($tournament=$query->fetch(PDO::FETCH_ASSOC))
            if ($tournament['status']== 1) 
                echo '<option value="'.$tournament['id'].'" '.  (($tournament['name'] == $_GET['to'])?'selected="selected"':"")  .'>'.$tournament['name'].'</option>';
            
    }


    function team_list(){
        
        echo '<option disabled>Select an option</option>';
        $user_id = $_SESSION["user"]['id'];
        $pdo = Database::getConnection();
        $sql = "SELECT teamname, id FROM teams WHERE user_id = '$user_id'";
        $query = $pdo->prepare($sql);
        $query->execute();

        while($team=$query->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="'.$team['id'].'" '. (($team['teamname'] == $_GET['tn'])?'selected="selected"':"") .'>' . $team['teamname'] . '</option>';
        }

    }

    function participants() {
        $id = $_GET['id'];
        $pdo = Database::getConnection();
        $sql = "SELECT * FROM registers WHERE id = '$id' LIMIT 1";
        $query = $pdo->prepare($sql);
        $query->execute();
        $register = $query->fetch(PDO::FETCH_ASSOC);

        return $register['n_participants'];
    }

    function teamExist($team_id, $category) {
        $pdo = Database::getConnection();

        $query = $pdo->prepare("SELECT COUNT(id) FROM registers WHERE team_id = '$team_id' AND category='$category'");
        $query->bindValue(1, $team_id);
        try{
            $query->execute();
            $rows = $query->fetchColumn();
            if($rows >= 1){
                return true;
            } else {
                return false;
            }
        }catch (PDOException $e){
            die($e->getMessage());
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin panel - Team update</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <div class="container">
            <form class='' method = 'post'>
                <fieldset class='content'>
                    <legend>Tournament register</legend>
                    <div class="separator">
                        <label for='team'>Select team: </label>
                        <select id='team' name='team'>
                            <?php 
                                team_list();
                             ?>
                        </select>
                    </div>
                    <div class="separator">
                        <label for='tournament'>Select tournament: </label>
                        <select id='tournament' name='tournament'>
                            <?php 
                                tournament_list();
                             ?>
                        </select>
                    </div>
                    <div class="separator">
                        <label for=''>Number of participants: </label>
                        <input type='number' min='1' name='number' value='<?= participants(); ?>' required>
                    </div>
                    <div class="separator">
                        <label for='category'>Category: </label>
                        <select id='category' name='category'>
                            <?php if (teamExist($_GET['tid'], 'Beginner')): ?>
                                    <?php if ($_GET['ca'] == 'Beginner'): ?>
                                        <option value="Beginner" <?php 
                                            if ($_GET['ca'] == 'Beginner')
                                                echo "selected";
                                        ?>>Beginner</option>
                                    <?php endif; ?>
                            <?php else: ?>
                                <option value="Beginner">Beginner</option>                                        
                            <?php endif; ?>
                            <?php if (teamExist($_GET['tid'], 'Amateur')): ?>
                                    <?php if ($_GET['ca'] == 'Amateur'): ?>                              
                                        <option value="Amateur"  <?php 
                                            if ($_GET['ca'] == 'Amateur')
                                                echo "selected";
                                        ?>>Amateur</option>
                                    <?php endif; ?>
                            <?php else: ?>
                                <option value="Amateur">Amateur</option>
                            <?php endif; ?>
                            <?php if (teamExist($_GET['tid'], 'Professional')): ?> 
                                    <?php if ($_GET['ca'] == 'Professional'): ?>                              
                                        <option value="Professional" <?php 
                                            if ($_GET['ca'] == 'Professional')
                                                echo "selected";
                                        ?>>Professional</option>
                                    <?php endif; ?>
                            <?php else: ?>
                                <option value="Professional">Professional</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <input type="submit" name="register" value="register">
                </fieldset>
            </form>
        </div>
    </body>
</html>
