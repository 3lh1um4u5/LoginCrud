<?php 
require_once "../clases/conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();
$sql="SELECT 
id_gasto,
conceptog,
cantidadg,
fecha
FROM t_gasto";
$result=mysqli_query($conexion,$sql);
?>
<div>
	<table class="table table-hover table-condensed table-bordered" id="iddatatable">
		<thead style="background-color:#2C5BD4;color:#070000; font#070000-weight: bold;">
			<tr>
				<td>Concepto de Gasto</td>
				<td>Cantidad de Gasto</td>
				<td>Fecha</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		
		<tbody style="background-color:#959595;color:#060000; ">
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr>
					<td><?php echo $mostrar[1]; ?></td>
					<td><?php echo $mostrar[2]; ?></td>
					<td><?php echo $mostrar[3]; ?></td>
					<td style="text-align: center;">
						<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar" onclick="agregarActualizar('<?php echo $mostrar[0]?>')">
							<span class="fa fa-pencil-square"></span>
						</span>
					</td>
					<td style="text-align: center;">
						<span class="btn btn-danger btn-sm" onclick="eliminarDatos('<?php echo $mostrar[0]?>')">
							<span class="fa fa-trash"></span>
						</span>
					</td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>	
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>