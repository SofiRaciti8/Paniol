<?php

include("conexionP.php");
	$conexionP=conexionP();

if(isset($_POST['guardar'])){
	$codArt = $_POST['codArt'];
	$iDtipo = $_POST['iDtipo'];
	$CantidadM = $_POST['CantidadM'];
	$motivo = $_POST['motivo'];
	$observaciones = $_POST['observaciones'];
	$query= "INSERT INTO modificacioes(idModificacion,codArt, iDtipo, CantidadM, motivo, Observaciones) VALUES (NULL,'$codArt', '$iDtipo', '$CantidadM','$motivo','$observaciones')";
	$result=mysqli_query($conexionP,$query);
	

	if($iDtipo=='B'){
		   $query2 = "UPDATE articulos SET Stock= Stock-$CantidadM where $codArt=codArt";
		   $resultado2=mysqli_query($conexionP,$query2);
		   $nombrem="Baja Realizada Correctamente";
		}else{
		if($iDtipo=='I'){
		   $query3 = "UPDATE articulos SET Stock= Stock+$CantidadM where $codArt=codArt";
		   $resultado3=mysqli_query($conexionP,$query3);
		   $nombrem="Ingreso Realizado Correctamente";
		}

}
if(!$result){

	echo"<script language='javascript'>";
echo "alert('hubo algun error');";
echo "window.location='../modificaciones.php';";
echo "</script>";
	}else{
		echo"<script language='javascript'>";
echo "alert('$nombrem');";
echo "window.location='../modificaciones.php';";
echo "</script>";
	}
	
}	
	

?>