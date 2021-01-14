<?php
require_once "conexion.php";
	$conexion=conexion();
if(isset($_GET['id']))
{
	 $sql="UPDATE articulos SET Estado= 0 where codArt='$id'";
	echo $sql;
	echo $result=mysqli_query($conexion,$sql);
}

 ?>


