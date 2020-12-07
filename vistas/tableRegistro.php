<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
	require_once "scripts.php";
	?>
</head>
<body style="background-color:#050000; ">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card text-center text-white bg-dark mb-3">
					<div class="card-header">
						<h3>Gestion de Gastos</h3>
					</div>
					<div class="card-body">
						<span class="btn btn-info" data-toggle="modal" data-target="#agregar">Añadir Gasto 
							<span class="fa fa-plus-square"></span>
						</span>
						<hr>
						<div id="tablaDatatable"></div>
					</div>
					<div class="card-footer text-muted">
						By 3lh1um4u5 <br>
	<button type="button" class="btn btn-warning">
	<a style="color:#050000; "href="../procesos/salir.php">salir</a>
	</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" >
			<div class="modal-content">
				<div class="modal-header"style="background-color:#3F61B9;" >
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" style="background-color:#3F61B9;" >
					<form id="frmnnuevo">
						<label>Concepto de Gasto</label>
						<input type="text" class="form-control input-sm" id="concepto" name="concepto">
						<label>Cantidad de Gasto</label>
						<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
						<label>Fecha</label>
						<input type="text" class="form-control input-sm" id="fecha" name="fecha">
					</form>
				</div>
				<div class="modal-footer" style="background-color:#3F61B9;">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnnuevo" class="btn btn-danger">Agregar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header"style="background-color:#3F61B9;">
					<h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"style="background-color:#3F61B9;">
					<form id="frmnnuevoU">
						<input type="text" hidden="" id="idgasto" name="idgasto">
						<label>Concepto de Gasto</label>
						<input type="text" class="form-control input-sm" id="conceptoU" name="conceptoU">
						<label>Cantidad de Gasto</label>
						<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
						<label>Fecha</label>
						<input type="text" class="form-control input-sm" id="fechaU" name="fechaU">
					</form>
				</div>
				<div class="modal-footer" style="background-color:#3F61B9;">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-danger" id="btnactualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnnuevo').click(function(){
			datos=$('#frmnnuevo').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/agregar.php",
				success:function(r){
					if (r==1) {
						$('#frmnnuevo')[0].reset();
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Agregado con exito");
					}else{
						alertify.error("fallo");
					}
				}
			});
		});
		$('#btnactualizar').click(function(){
			datos=$('#frmnnuevoU').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/actualizar.php",
				success:function(r){
					if (r==1) {
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Actualizado con exito");
					}else{
						alertify.error("fallo al actualizar");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('tabla.php');
	});
</script>

<script type="text/javascript">
	function agregarActualizar(idgasto){
		$.ajax({
			type:"POST",
			data:"idgasto=" + idgasto,
			url:"../procesos/obtenDatos.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#idgasto').val(datos['id_gasto']);
				$('#conceptoU').val(datos['conceptog']);
				$('#cantidadU').val(datos['cantidadg']);
				$('#fechaU').val(datos['fecha']);
			}
		});
	}
	function eliminarDatos(idgasto){
		alertify.confirm('Eliminar','¿Esta seguro de eliminar?',function (){
			$.ajax({
				type:"POST",
				data:"idgasto=" + idgasto,
				url:"../procesos/eliminar.php",
				success:function(r){
					if (r==1) {
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado con exito");
					}else{
						alertify.error("No se pudo eliminar");
					}
				}
			});
		}
		,function(){
		});
	}
</script>