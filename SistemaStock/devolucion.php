<?php 
  require_once "php/conexionP.php";
  $conexionP=conexionP();


$idPres=$_GET['id'];
$sqldev=mysqli_query($conexionP,"SELECT * FROM prestamos WHERE idMovimiento=$idPres");
$result_sqldev=mysqli_num_rows($sqldev);

  while($datadev = mysqli_fetch_array($sqldev)){
    $idMovimiento = $datadev['idMovimiento'];
    $idPrestamo = $datadev['idPrestamo'];
    $codArti= $datadev['codArt'];
   
    $Cantiddd = $datadev['Cantid'];
    $estado=$datadev['estado'];
    $FechaRegistro=$datadev['FechaRegistro'];
  } 

$sqldev2=mysqli_query($conexionP,"SELECT * FROM registroprestamos WHERE idPrestamo=$idPrestamo");
$result_sqldev2=mysqli_num_rows($sqldev2);

  while($datadev2 = mysqli_fetch_array($sqldev2)){
    $idProfesoru = $datadev2['idProfesor'];
    $Alumnou = $datadev2['Alumno'];
  } 


  $sqldev3="SELECT Descripcion FROM articulos WHERE codArt=$codArti";
   $resultadom=mysqli_query($conexionP,$sqldev3);

  while($datadev3 = mysqli_fetch_array($resultadom)){
    $Descripcion0 = $datadev3[0];
  } 

  $sqldev34="SELECT p.idMovimiento,l.Nombre,r.Alumno,p.Cantid,p.FechaRegistro 
    FROM prestamos p
    INNER JOIN registroprestamos r ON p.idPrestamo=r.idPrestamo
    INNER JOIN articulos a ON a.codArt = p.codArt
    INNER JOIN profesores l ON l.idProfesor=r.idProfesor 
    where a.codArt=p.codArt GROUP by p.idMovimiento";
   $resultadom=mysqli_query($conexionP,$sqldev34);

  while($datadev34 = mysqli_fetch_array($resultadom)){
    $idProfesoru = $datadev34[1];
  } 



  if(isset($_POST['Devolucion'])){

  $idMovi=$_GET['id'];

  $devcod = $_POST['devcod'];

  $iDtipodev = $_POST['iDtipodev'];

  $devCantid = $_POST['devCantid'];

  $devCantidM = $_POST['devCantidM'];


  $sql25dev = "INSERT INTO devolucion(idMovimiento,codArt,iDtipo,CantidBE,CantidME)
      values ('$idMovi','$devcod','$iDtipodev','$devCantid','$devCantidM')";
    $query25dev = mysqli_query($conexionP,$sql25dev);
    
$dev="dev";



$sql26 = "UPDATE prestamos SET 
estado='".$dev ."'
  WHERE idMovimiento='".$idMovi."' ";
    $query26 = mysqli_query($conexionP,$sql26);

    if(isset($sql26)){
$sqlup = "UPDATE articulos SET Stock=Stock+$Cantiddd
 WHERE codArt='".$devcod."' ";
    $queryup = mysqli_query($conexionP,$sqlup);
  }

 


$iDtipo='B';
$Motivo='Rotura';
$Observaciones='Material devuelto en mal estado';
$responsable='sofi';

    if ($devCantidM > 0)
      $sqlrotura = "INSERT INTO modificacioes(idModificacion,codArt,iDtipo,CantidadM,Motivo,Observaciones)
      values (NULL,'$devcod','$iDtipo','$devCantidM','$Motivo','$Observaciones')";
    $queryrotura= mysqli_query($conexionP,$sqlrotura);

if(isset($queryrotura)){
   
    $sql26 = "UPDATE articulos SET Stock=Stock-$devCantidM
  WHERE codArt='".$devcod."' ";
    $query26 = mysqli_query($conexionP,$sql26);

}



  if(!$query25dev){
    die("fallo");


  }


  header('Location: registroMov.php');
}

?>

<?php
include('template.php'); 
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


  <title>Tabla</title>
  
   <link rel="stylesheet" href="custose.css">
  
  
</head>
<section class="content center">
      <div class="row" class="center">
        <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
          
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registrar Devolución</h3>
            </div>
           <form action="" method="POST">
            <div class="box-body">

              <div class="form-group">
                  <label>Profesor</label>
                  <input name="devprofe" type="text" class="form-control" value="<?php echo $idProfesoru ?>" readonly>
                </div>
                
                <div class="form-group">
                  <label>Codigo Articulo</label>
                  <input name="devcod" type="text" class="form-control" value="<?php echo $codArti?>" readonly>
                </div>

                <div class="form-group">
                  <label>Descripcion</label>
                  <input name="devdescrip" id="DescripcionE" type="text" class="form-control" value="<?php echo $Descripcion0?>" readonly >
                </div>
                
                  
                  <input name="iDtipodev" type="hidden" class="form-control" value="D">
                


                <div class="form-group">
                  <label>Cantidad Buen Estado</label>
                  <input name="devCantid" type="text" class="form-control" value="<?php echo $Cantiddd?>">
                </div>

                <div class="form-group">
                  <label>Cantidad Mal Estado/Roto</label>
                  <input name="devCantidM" type="text" class="form-control" value='0'>
                </div>
                
              
              <div class="box-footer">
                <input type="submit" class="btn btn-block btn-info" calss="text-center" name="Devolucion" value="Guardar Devolución">

              </div>
            </form>
          </div>

</section>

</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Escuela De Educación Secundaria Técnica N°1</strong>
  </footer>


<!-- Bootstrap 3.3.7 -->

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->

<!-- AdminLTE for demo purposes -->

</script>