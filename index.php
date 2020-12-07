<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php require_once "scripts.php"; ?>
	<style>
		.container {
			max-width: 650px;
			padding: 80px;



		}
		.push-top {
			margin-top: auto;
			max-width: 400px;
			background-color:#3F61B9; 
			
		}

		
	</style>
</head>
<body style="background-color:#030000;">
	
	<div class="container">
		<div class="card push-top">
			<div class="row">
				<div class="col-sm-12">
					<div class="card-header">
						Login 
					</div>
					<form action="procesos/login.php" method="post">
						<div class="card-body">
							<label for="usuario">Usuario</label>
							<input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ejemplo:3lh1um4u5">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Ejemplo">
							<br>
							<button class="btn btn-dark">Logear</button>
							<a href="registro.php" class="btn btn-danger">Registrar</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>