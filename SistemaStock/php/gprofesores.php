<?php 
	include("conexionP.php");
	$conexionP=conexionP();


	$nombreprofe=$_POST["profe"];

 $nuevoprof="INSERT INTO profesores(idProfesor,Nombre)
						values (NULL,'$nombreprofe')";
	$resulnuevaunidad=mysqli_query($conexionP,$nuevoprof);
	

	header('location: ../profesores.php');

?>
 