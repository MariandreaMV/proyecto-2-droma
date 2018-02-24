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
        <div class="">
        	<table id='table-custom' class='table'>
        		<tr>
                    <th>User</th>
        			<th>Team's name</th>
        			<th>Registration date</th>
        			<th>Address</th>
        			<th>Email</th>
        			<th>Website</th>
        		</tr>
				<?php
                    $team_id = $_GET['id'];
                    $sql = "SELECT * FROM teams WHERE id = '$team_id' LIMIT 1";
	                $query = $pdo->prepare ($sql);
	                $result = $query->execute ();

	                while ($current = $query->fetch (PDO::FETCH_ASSOC)):
	            ?>
	                <tr>
                        <?php 
                            $user_id = $current['user_id'];
                            $sql = "SELECT username fROM users where id = '$user_id' LIMIT 1";
                            $query = $pdo->prepare ($sql);
                            $query->execute ();
                            $user = $query->fetch(PDO::FETCH_ASSOC);
                            $username = $user['username'];
                        ?>
	                    <td><?= $username ?></td>
	                    <td><?= $current['teamname'] ?></td>
	                    <td><?= $current['date'] ?></td>
                        <td><?= $current['address'] ?></td>
                        <td><?= $current['email'] ?></td>
	                    <td><?= $current['website'] ?></td>
	                </tr>
	            <?php endwhile ?>
            </table>
            <div class="separator">
               <a class="button button-align" href=''>Back</a>
            </div>
        </div>
    </body>
</html>
