<?php 
    include_once '../../config/config.php';
    $pdo = Database::getConnection();
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
	                    <td><a href="details.php?id=<?= $current['team_id'] ?>">Details</a></td>
	                    <td><a href="edit.php?id=<?= $current['id'] ?>&tn=<?= $current['teamname'] ?>&to=<?= $current['name'] ?>&ca=<?= $current['category'] ?>&tid=<?= $current['team_id'] ?>">Edit</a></td>
	                    <td><a href='delete.php?id=<?= $current['id'] ?>'>Delete</a></td>
	                </tr>
	            <?php endwhile ?>
        	</table>
            <div class="separator">
               <a class="button button-align" href='/php/admin/index.php'>Back</a>
            </div>
        </div>
    </body>
</html>
