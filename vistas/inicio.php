<?php
	session_start();
	if (isset($_SESSION['usuario'])) {
		require_once "scripts.php";
		require_once "tableRegistro.php";
	?>
	<?php
	}else{
		header("location:../index.php");
	}
?>