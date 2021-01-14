<?php 
	include("conexionP.php");
	$conexionP=conexionP();


	$nuevodeposito=$_POST["nuevodeposito"];

 $nuevodep="INSERT INTO depositos(idDeposito,Descripcion)
								values (NULL,'$nuevodeposito')";
	$resulnuevodep=mysqli_query($conexionP,$nuevodep);
	

	header('location: ../depositos.php');


 ?>