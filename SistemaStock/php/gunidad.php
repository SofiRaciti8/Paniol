<?php 
	include("conexionP.php");
	$conexionP=conexionP();


	$abre=$_POST["abre"];
	$nombreunidad=$_POST["nombreunidad"];

 $nuevaunidad="INSERT INTO unidad(idUnidad,Descripcion)
						values ('$abre','$nombreunidad')";
	$resulnuevaunidad=mysqli_query($conexionP,$nuevaunidad);
	

	header('location: ../unidades.php');


 ?>