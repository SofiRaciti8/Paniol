<?php 
	include("conexionP.php");
	$conexionP=conexionP();


	$codigo=$_POST["codigo"];
	$Descripcion=$_POST["Descripcion"];

$tipo=$_POST["tipo"];

$cantidad=$_POST["cantidad"];

$unidad=$_POST["unidad"];

$deposito=$_POST["deposito"];
$fila=$_POST["fila"];
$columna=$_POST["columna"];


$N2="INSERT INTO estanterias(fila,columna)
values ('$fila','$columna')";

	$resulnuevo2=mysqli_query($conexionP,$N2);

	$idr=mysqli_insert_id($conexionP);

$n1="INSERT INTO articulos(codArt,Descripcion,idTipoA,Stock, idUnidad, idDeposito, idEstanteria)
values ('$codigo','$Descripcion','$tipo','$cantidad','$unidad','$deposito', '$idr')";

	$resulnuevo1=mysqli_query($conexionP,$n1);

header('Location:../index.php');