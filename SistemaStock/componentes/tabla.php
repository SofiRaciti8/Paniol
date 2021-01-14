
<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();

 ?>
 <h2>Inventario</h2>
<div class="row">
	<div class="col-sm-11">
		<table class="table table-hover table-condensed table-bordered" id="tablaDinamicaLoad">
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
		<thead>
			<tr>
				<td>CodigoProducto</td>
				<td>Descripcion</td>
				<td>Tipo</td>
				<td>Stock</td>
				<td>Unidad</td>
				<td>Deposito</td>
				<td>Estanteria</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			</thead>
			<tbody>

			<?php 
			if (isset($_SESSION['consulta'])){
				if($_SESSION['consulta']>0){
				$idp=$_SESSION['consulta'];
		$sql="SELECT A.codArt,A.Descripcion,T.Descripcion,A.Stock,U.Descripcion,D.Descripcion,E.Descripcion from articulos A 
		INNER JOIN depositos D ON D.idDeposito=A.idDeposito
		INNER JOIN estanteria E ON E.IdEstant=A.IdEstant
		
		INNER JOIN tipoarticulo T ON T.idTipoA=A.idTipoA
		INNER JOIN unidad U ON U.idUnidad=A.idUnidad
		 where Estado=1 and codArt='$idp'";	
				}else{
					$sql="SELECT A.codArt,A.Descripcion,T.Descripcion,A.Stock,U.Descripcion,D.Descripcion,E.Descripcion from articulos A 
					INNER JOIN depositos D ON D.idDeposito=A.idDeposito
					INNER JOIN estanteria E ON E.IdEstant=A.IdEstant
					INNER JOIN tipoarticulo T ON T.idTipoA=A.idTipoA
					INNER JOIN unidad U ON U.idUnidad=A.idUnidad
					 where Estado=1";

				}
				
				}else{


			$sql="SELECT A.codArt,A.Descripcion,T.Descripcion,A.Stock,U.Descripcion,D.Descripcion,E.Descripcion from articulos A 
			   INNER JOIN depositos D ON D.idDeposito=A.idDeposito
			   INNER JOIN estanteria E ON E.IdEstant=A.IdEstant 
			   INNER JOIN tipoarticulo T ON T.idTipoA=A.idTipoA 
			   INNER JOIN unidad U ON U.idUnidad=A.idUnidad
			   where Estado=1";
			}
				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 
					$datos=$ver[0]."||".
					       $ver[1]."||".
					       $ver[2]."||".
					       $ver[3]."||".
					       $ver[4]."||".
					       $ver[5]."||".
					       $ver[6];

			 ?>

			<tr>
				<td><?php echo $ver[0] ?></td>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td><?php echo $ver[5] ?></td>
				<td><?php echo $ver[6] ?></td>
				

				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
			</tbody>
		</table>

	</div>
</div>
<div class="container">
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDinamicaLoad').DataTable();
	});
</script>