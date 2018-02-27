<?php
	session_start();
	include_once "../config/config.php";

	if (isset($_SESSION['user'])) {
		if ($_SESSION['user']['status'] == 1) {
			header("location:../admin/index.php");
		} else {
			header("location:../index.php");
		}
	}

	function sign_in($user) {
		$_SESSION["user"] = $user;
		if ($user['status'] == 1) {
			$_SESSION['admin'] = true;
			header("location:../admin/index.php");
		} else {
			header("location:../index.php");
		}
	}

	if (isset($_POST["login"])) {

		$username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
		$password = md5(filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING));

		$pdo = Database::getConnection();
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$query = $pdo->prepare($sql);

		try {
			$query->execute();
			$user =  $query->fetch(PDO::FETCH_ASSOC);
			if ($user) {
				sign_in($user);
			} else {
				$_SESSION['failure'] = true;
			}
		} catch (Exception $e) {}
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
		<?php if (isset($_SESSION['failure'])): ?>
			<div class="failure">
				Incorrect username or password
			</div>
		<?php session_unset($_SESSION['failure']); endif ?>
		<form class='' method='post'>
			<fieldset class='content'>
				<legend>Sign in</legend>
				<div class="separator">
					<label for='username'>Username</label>
					<input id='username' type='text' name='username'>
				</div>
				<div class="separator">
					<label for='password'>Password</label>
					<input id='password' type='password' name='password'>
				</div>
				<div class="separator">
					<input class='button btn-web' type="submit" name="login" value="Login">
				</div>
			</fieldset>
		</form>
		<div class="separator">
			<a class="button btn-web" href="/">Back</a>
		</div>
	</div>
</body>
</html>
