<?php 
	require_once "../clases/conexion.php";
	require_once "../clases/crud.php";
	$obj=new crud();
	$datos=array(
		$_POST['conceptoU'],
		$_POST['cantidadU'],
		$_POST['fechaU'],
		$_POST['idgasto']
	);

	echo $obj->actualizar($datos);
 ?>