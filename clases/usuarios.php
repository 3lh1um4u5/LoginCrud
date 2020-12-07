<?php 
require_once "conexion.php";
class Usuarios extends conectar{

	public function agregarUsuario($nombre, $apellidoM, $email, $usuario, $password){
		$conexion = conectar::conexion();
		$password = sha1($password);
		$sql = "INSERT INTO l_registro(nombre, apellidoM, email, usuario, password)
		VALUES ('$nombre','$apellidoM','$email','$usuario','$password')";
		$result = mysqli_query($conexion,$sql);
		return $result;
	}

	public function login($usuario, $password){
		$conexion = conectar::conexion();
		$password = sha1($password);
		$sql = "SELECT count(*) as total FROM l_registro
		WHERE usuario = '$usuario' AND password = '$password'";
		$result = mysqli_query($conexion,$sql);
		$datos = mysqli_fetch_array($result);

		if ($datos['total']>0) {
			$_SESSION['usuario']=$usuario;
			header("location:../vistas/inicio.php");
		}else{
			header("location:../index.php");
		}
	}
}
?>