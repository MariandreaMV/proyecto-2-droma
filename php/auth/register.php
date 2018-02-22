<html>
<head>
	<meta charset='utf-8'>
	<title>Sistema de torneos deportivos</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	<div class='container'>
		<form class=''>
			<fieldset class='content'>
				<legend>Registro</legend>
				<div class='separator'>
					<label for='name'>Nombre del Equipo: </label>
					<input id='name' type='text' name='name' required>
				</div>
				<div class='separator'>
					<label for='short-name'>Nombre corto: </label>
					<input id='short-name' type='text' name='short-name' required>
				</div>	
				<div class='separator'>
					<label for='date'>Fecha de creacion: </label>
					<input id='date' type='date' name='date' required>
				</div>
				<div class="separator">
					<label for='address'>Dirección del responsable: </label>
					<input id='address' type='text' name='address' placeholder=' Opcional' required>
				</div>
				<div class="separator">
					<label for='email'>Correo electrónico: </label>
					<input id='email' type='email' name='email' required>
				</div>
				<div class="separator">
					<label for='website'>Sitio web: </label>
					<input id='website' type='text' name='website' placeholder=' Opcional' required>
				</div>
				<hr>
				<div class="separator">
					<label for='username'>Nombre de usuario: </label>
					<input id='username' type='text' name='username' required>
				</div>
				<div class="separator">
					<label for='password'>Contraseña: </label>
					<input id='password' type='password' name='password' required>
				</div>
				<div class="separator">
					<button>Registrar </button>
				</div>
			</fieldset>
		</form>
	</div>
</body>
</html>