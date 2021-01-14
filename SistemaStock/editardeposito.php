<?php 
  require_once "php/conexionP.php";
  $conexionP=conexionP();

$iddep=$_GET['id'];

$sql5dep=mysqli_query($conexionP, "SELECT * FROM depositos WHERE idDeposito=$iddep");
$result_sql5dep=mysqli_num_rows($sql5dep);

  while($data5dep = mysqli_fetch_array($sql5dep)){
    $descripudep = $data5dep['Descripcion'];
  } 





  if(isset($_POST['editary'])){
  $iddep=$_GET['id'];

  $DescripcionEdep = $_POST['DescripcionEdep'];


  $sql25dep = "UPDATE depositos SET Descripcion='".$DescripcionEdep ."'
  WHERE idDeposito='".$iddep."' ";
    $query25dep = mysqli_query($conexionP,$sql25dep);
  


  if(!$query25dep){
    die("fallo");


  }


  header('Location: depositos.php');
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
              <h3 class="box-title">Editar Depositos</h3>
            </div>
           <form action="" method="POST">
            <div class="box-body">
                
                <div class="form-group">
                  <label>Codigo</label>
                  <input name="DescripcionEdep" id="codigoE" type="text" class="form-control" value="<?php echo  $descripudep ?>">
                </div>

              <div class="box-footer">
                <input type="submit" class="btn btn-block btn-info" calss="text-center" name="editary" value="Guardar">

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