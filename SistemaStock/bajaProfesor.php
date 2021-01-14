<?php


require_once "php/conexionP.php";
  $conexionP=conexionP();

if(!empty($_REQUEST['id']))
 {
 
  $id = $_REQUEST['id'];

  $query7= mysqli_query($conexionP,"SELECT * FROM profesores WHERE idProfesor=$id");
  $result7=mysqli_num_rows($query7); 

  if($result7 > 0){
    while($data7=mysqli_fetch_array($query7)){
     $idProfesor = $data7['idProfesor'];
    }

  }
 }


if(!empty($_POST))
{
   $id=$_GET['id'];

  $sql7="UPDATE profesores SET estado=0 where idProfesor='$id'";
  $result7=mysqli_query($conexionP,$sql7);
   if($result7){
   header('location: profesores.php');
   }else{
    echo'error';
   }

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
        <div class="col-md-10 col-sm-6 col-xs-6 col-md-offset-1">
          
          <div class="box box-warning">
            <div class="box-header with-border">
              <h1 class="text-center">¿Está Seguro de eliminar este registro? </h1>
            </div>
           <form action="" method="POST">
          
        

              <div class="box-footer">
                 <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4">
                <input type="submit" class="btn btn-warning" calss="text-center" name="eliminar" value="Aceptar">

                <a href="profesores.php" button type="reset" class="btn btn-default" calss="text-center">Cancelar</button></a>
</div>
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