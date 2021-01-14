<?php

$profe=$_POST['idProfesor'];
$alumno=$_POST['alumno'];
$cantidad=$_POST['cantidadd'];


include('php/conexionP.php');
$conexionP=conexionP();

$prestamo ="INSERT INTO registroprestamos (idPrestamo, idProfesor,Alumno,CantidadArt ) VALUES (NULL,'$profe','$alumno','$cantidad')";

    $queryp = mysqli_query($conexionP,$prestamo);

    $idr = mysqli_insert_id($conexionP);



    if(!$queryp){
		die("fallo");

	}else{

	header("Location: prestamos.php?id=$idr&cant=$cantidad");
	
	}