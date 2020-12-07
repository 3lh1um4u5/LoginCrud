<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuario</title>
	<?php require_once "scripts.php"; ?>
	<style>
	.container {
		max-width: 650px;
		padding: 80px;
	}
	.push-top {
		margin-top: auto;
		max-width: 450px;
		background-color:#3F61B9; 
	}
</style>
</head>
<body style="background-color:#030000;">
	
</style>
	<div class="container">
		<div class="card push-top">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-header">
						Registrar Usuario Nuevo
					</div>
					<div class="card-body">
						<form action="procesos/registro.php" method="post">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" class="form-control" required="">
							<label for="apellido">Apellidos</label>
							<input type="text" name="apellido" class="form-control" required="">
							<label for="email">Email</label>
							<input type="text" name="email" class="form-control" required="">
							<label for="usuario">Usuario</label>
							<input type="text" name="usuario" class="form-control" required>
							<label for="password">Password</label>
							<input type="text" name="password" class="form-control" required>
							<br>
							<button class="btn btn-danger">Registrarse</button>
							<a href="index.php" class="btn btn-dark">Logear</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>