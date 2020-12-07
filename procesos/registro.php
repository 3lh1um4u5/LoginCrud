<?php 
require_once "../clases/usuarios.php";
$Usuarios = new Usuarios();

$nombre = $_POST['nombre'];
$apellidoM = $_POST['apellido'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$respuesta = $Usuarios->agregarUsuario($nombre, $apellidoM, $email, $usuario, $password);

if ($respuesta) {
	?>
	<script>
		alert("Resgitro xitoso");
		window.location.href= '../registro.php';
	</script>

	<?php
}else{
	?>
	<script>
		alert("fallo al agregar usuario");
		window.location.href = '../registro.php';
	</script>
	<?php
}

?>