
<?php
include("conexionP.php");
	$conexionP=conexionP();
	

$idprestamo=$_POST['idprestamo']; 

$codArt=$_POST['codArt'];

$iDtipo=$_POST['iDtipo']; 

$cantid=$_POST['cantid']; 


$cadenad= "INSERT INTO prestamos (idPrestamo,codArt,iDtipo,Cantid) VALUES ";
   
for ($var=0; $var< count($codArt); $var++){

$cadenad.="('".$idprestamo[$var]."', '".$codArt[$var]."', '".$iDtipo[$var]."','".$cantid[$var]."'),";

}


$cadena_finald =substr($cadenad, 0, -1);
$cadena_finald.=";";


$qb = mysqli_query($conexionP,$cadena_finald);


$hola= json_encode($idprestamo[0]);
//desde
$cantidadr =substr($cadenad, 62,-1);

$array = array($cantidadr);

$longitud = count($array);



$sqldevv=mysqli_query($conexionP,"SELECT * FROM prestamos WHERE idPrestamo=$hola");
$result_sqldevv=mysqli_num_rows($sqldevv);

  while($datadevv = mysqli_fetch_array($sqldevv)){
    $codigg = $datadevv['codArt'];
    $cantidadd = $datadevv['Cantid'];
  

 
$sqlupv = "UPDATE articulos SET Stock=Stock-$cantidadd 
 WHERE codArt='".$codigg."' ";
    $queryupv= mysqli_query($conexionP,$sqlupv);

//$cantidadr =substr($cadenad, 62,-1);

//$array = array($cantidadr);
 
//saco el numero de elementos
//$longitud = num_rows($array);
//echo $longitud;
 
//Recorro todos los elementos
//for($i=0; $i<$longitud; $i++)
      //{
      //saco el valor de cada elemento
	  //echo $array[$i];

	  //echo "<br>";
      //}
//for ($variable=0; $variable< count($cadenad); $variable++){
//$codArtrrr=$cadenad[1];
//$c=$cadenad[3];
}

//echo $codArtrrr;
//echo $c;

if(!$qb){
echo"<script language='javascript'>";
echo "alert('hubo algun error');";
//echo "window.location='../ticket.php';";
echo "</script>";
	}else{
		echo"<script language='javascript'>";
echo "alert('Prestamo Realizado Correctamente');";

echo "window.open('../ticket.php?id=$hola','_blank');";
//echo "window.location=('_blank', '../ticket.php?id=$hola');";
echo "window.location='../Registromov.php ';";
echo "</script>";
	}
	




