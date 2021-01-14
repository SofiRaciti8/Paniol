<?php 
	include("conexionP.php");
	$conexionP=conexionP();


	$codmovi=$_POST["codmovi"];
	$nuevomovimiento=$_POST["nuevomovimiento"];

 $nuevomovi="INSERT INTO tiposmov(iDtipo,Descripcion)
						values ('$codmovi','$nuevomovimiento')";
	$resulnuevomovi=mysqli_query($conexionP,$nuevomovi);
	

	header('location: ../tipomovimiento.php');


 ?>