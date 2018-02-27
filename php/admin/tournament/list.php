<?php
    session_start();
    include_once '../../config/config.php';
    $pdo = Database::getConnection();

    if (!$_SESSION['admin'])
        header ("Location:../../../index.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin panel - Tournament list</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <div class='table-container'>
            <div class="separator">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class='success'>
                        Register updated succesfully
                    </div>
                <?php unset($_SESSION['success']); endif ?>
                <?php if (isset($_SESSION['success_d'])): ?>
                    <div class='success'>
                        Register deleted succesfully
                    </div>
                <?php unset($_SESSION['success_d']); endif ?>
                <table id='table-custom' class='table'>
                    <tr>
                        <th>Tournament</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM tournaments";
                        $query = $pdo->prepare ($sql);
                        $result = $query->execute ();

                        while ($current = $query->fetch (PDO::FETCH_ASSOC)):
                    ?>
                        <tr>
                            <td><?= $current['name'] ?></td>
                            <td><?= $current['date'] ?></td>
                            <td><?= (($current['status'] == 1)? "Available":"Not available") ?></td>
                            <td><a class="btn" href="/php/admin/tournament/edit.php?id=<?= $current['id'] ?>">Edit</a></td>
                            <td><a class="btn" href="/php/admin/tournament/delete.php?id=<?= $current['id'] ?>">Delete</a></td>
                        </tr>
                    <?php endwhile ?>
                </table>
            </div>
            <div class="separator">
               <a class="button btn-web" href='/php/admin/index.php'>Back</a>
            </div>
        </div>
    </body>
</html>
