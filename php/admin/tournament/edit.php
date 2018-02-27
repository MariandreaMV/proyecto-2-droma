<?php
    session_start();
    include_once '../../config/config.php';
    $pdo = Database::getConnection();

    if (!$_SESSION['admin'])
        header ("Location:../../../index.php");

    if (isset($_POST['register'])) {
        $username = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date',FILTER_SANITIZE_STRING);
        $status = $_POST['status'];
        $id = $_POST['id'];

        $sql = "UPDATE tournaments SET name=:name, date=:date, status=:status WHERE id='$id'";

        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'name'   => $username,
            'date'   => $date,
            'status' => $status
        ]);
        $_SESSION['success'] = true;
        header('Location:/php/admin/tournament/list.php');
    } else {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tournaments WHERE id =:id";
        $query = $pdo->prepare($sql);
        $query->execute([
            'id' => $id
        ]);

        $row = $query->fetch(PDO::FETCH_ASSOC);

        $name   = $row['name'];
        $date   = $row['date'];
        $status = $row['status'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin panel - Edit tournament</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <div class='container'>
            <form method='post'>
                <fieldset class='content'>
                    <legend>Tournament edit</legend>
                    <div class="separator">
                        <label for='name'>Tournament name</label>
                        <input id='name' name='name' type='text' value='<?= $row['name'] ?>' required>
                    </div>
                    <div class="separator">
                        <label for='date'>Date</label>
                        <input id='date' name='date' type='date' value='<?= $row['date'] ?>' required>
                    </div>
                    <div class="separator">
                        <label for='status'>Status</label>
                        <select name='status'>
                            <option value='1' <?= (($row['status']==1)?'selected':'') ?>>Available</option>
                            <option value='0' <?= (($row['status']==0)?'selected':'') ?>>Not available</option>
                        </select>
                    </div>
                    <input type='hidden' name='id' value='<?= $row['id'] ?>'>
                    <div class="separator">
                        <input class="button btn-web" type='submit' name='register' value='register'>
                    </div>
                </fieldset>
            </form>
            <div class="separator">
               <a class="button btn-web" href='/php/admin/tournament/list.php'>Back</a>
            </div>
        </div>
    </body>
</html>
