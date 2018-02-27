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
        <title>Admin panel - Team list</title>
        <link rel="stylesheet" type="text/css" href="/css/style.css">
    </head>
    <body>
        <div class="table-container">
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
        			<th>Category</th>
        			<th>Team's name</th>
        			<th>Number of participants</th>
        			<th></th>
        			<th>Edit</th>
        			<th>Delete</th>
        		</tr>
				<?php
	                $sql = "SELECT teams.teamname, tournaments.name, registers.id, registers.team_id, registers.category, registers.n_participants FROM teams, tournaments, registers WHERE teams.id = registers.team_id AND tournaments.id = registers.tournament_id";
 	                $query = $pdo->prepare ($sql);
	                $result = $query->execute ();

	                while ($current = $query->fetch (PDO::FETCH_ASSOC)):
	            ?>
	                <tr>
	                    <td><?= $current['name'] ?></td>
	                    <td><?= $current['category'] ?></td>
	                    <td><?= $current['teamname'] ?></td>
	                    <td><?= $current['n_participants'] ?></td>
	                    <td><a class='btn' href="details.php?id=<?= $current['team_id'] ?>">Details</a></td>
	                    <td><a class='btn' href="edit.php?id=<?= $current['id'] ?>&tn=<?= $current['teamname'] ?>&to=<?= $current['name'] ?>&ca=<?= $current['category'] ?>&tid=<?= $current['team_id'] ?>">Edit</a></td>
	                    <td><a class='btn' href='delete.php?id=<?= $current['id'] ?>'>Delete</a></td>
	                </tr>
	            <?php endwhile ?>
        	</table>
            <div class="separator">
               <a class="button btn-web" href='/php/admin/index.php'>Back</a>
            </div>
        </div>
    </body>
</html>
