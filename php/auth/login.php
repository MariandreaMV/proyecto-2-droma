<?php 
	session_start();
	include_once "../config/config.php";

	function sign_in($user){
		$_SESSION["user"] = $user;
		header("location:../tournament_register.php");
	}

	if (isset($_POST["login"])) {
		
		$username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
		$password = md5(filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING));

		$pdo = Database::getConnection();
		$sql ="SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$query = $pdo->prepare($sql);
		
		try {
			$query->execute();
			$user =  $query->fetch(PDO::FETCH_ASSOC);
			if ($user) {
				sign_in($user);	
			}else{
				echo "incorrect user or pass";
			}
				
		} catch (Exception $e) {
			
		}

	}

?>



<html>
<head>
	<meta charset='utf-8'>
	<title>Sport tournament system</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class='container'>
		<form class='' method='post'>
			<fieldset class='content'>
				<legend>Sign in</legend>
				<div class="separator">
					<label for='username'>Username: </label>
					<input id='username' type='text' name='username'>
				</div>
				<div class="separator">
					<label for='password'>Password: </label>
					<input id='password' type='password' name='password'>
				</div>
				<div class="separator">
					<input type="submit" name="login" value="login">
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>