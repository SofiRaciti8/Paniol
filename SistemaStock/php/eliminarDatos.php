
<?php 
	include("php/conexionP.php");
    $conexionP=conexionP();
	$id=$_POST['codArt'];

	$sql="UPDATE articulos SET Estado= 0 where codArt='$id'";
	echo $sql;
	echo $result=mysqli_query($conexion,$sql);
 ?>