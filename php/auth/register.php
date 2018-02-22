<html>
<head>
	<meta charset='utf-8'>
	<title>Sport tournament system</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class='container'>
		<form class=''>
			<fieldset class='content'>
				<legend>Register</legend>
				<div class='separator'>
					<label for='name'>Team's name: </label>
					<input id='name' type='text' name='name' required>
				</div>
				<div class='separator'>
					<label for='short-name'>Short name: </label>
					<input id='short-name' type='text' name='short-name' required>
				</div>	
				<div class='separator'>
					<label for='date'>Creation date : </label>
					<input id='date' type='date' name='date' required>
				</div>
				<div class="separator">
					<label for='address'>Address of the responsible: </label>
					<input id='address' type='text' name='address' placeholder=' Optional' >
				</div>
				<div class="separator">
					<label for='email'>Email address: </label>
					<input id='email' type='email' name='email' required>
				</div>
				<div class="separator">
					<label for='website'>Website: </label>
					<input id='website' type='text' name='website' placeholder=' Optional' >
				</div>
				<hr>
				<div class="separator">
					<label for='username'>Username: </label>
					<input id='username' type='text' name='username' required>
				</div>
				<div class="separator">
					<label for='password'>Password: </label>
					<input id='password' type='password' name='password' required>
				</div>
				<div class="separator">
					<button>Register </button>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>