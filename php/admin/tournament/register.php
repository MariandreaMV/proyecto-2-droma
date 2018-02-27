<?php
    session_start();
    include_once '../../config/config.php';
    $pdo = Database::getConnection();

    if (!$_SESSION['admin'])
        header ("Location:../../../index.php");

    if (isset($_POST['register'])) {
        $username = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date',FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO tournaments (name, date, status) VALUES (:name, :date, :status)";
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'name'   => $username,
            'date'   => $date,
            'status' => 1
        ]);
        $_SESSION['result'] = $result;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin panel - Create tournament</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <div class='container'>
            <?php if ($_SESSION['result']): ?>
                <div class="success">
                    Registered Successfully!!
                </div>
            <?php session_unset($_SESSION['result']); endif ?>
            <form method='post'>
                <fieldset class='content'>
                    <legend>Tournament register</legend>
                    <div class="separator">
                        <label for='name'>Tournament name</label>
                        <input id='name' name='name' type='text' required>
                    </div>
                    <div class="separator">
                        <label for='id'>Date</label>
                        <input id='date' name='date' type='date' required>
                    </div>
                    <div class="separator">
                        <input class="button btn-web" type='submit' name='register' value='Register'>
                    </div>
                </fieldset>
            </form>
            <div class="separator">
               <a class="button btn-web" href='/php/admin/index.php'>Back</a>
            </div>
        </div>
    </body>
</html>
