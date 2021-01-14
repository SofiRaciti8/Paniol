<?php 
	include("conexionP.php");
	$conexionP=conexionP();


	$NuevoTipo=$_POST["nuevotipo"];

 $nuevo="INSERT INTO tipoarticulo(idtipoA,Descripcion)
								values (NULL,'$NuevoTipo')";
	$resulnuevo=mysqli_query($conexionP,$nuevo);
	

	header('location: ../tipoarticulo.php');


 ?>