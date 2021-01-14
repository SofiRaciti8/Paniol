<?php 
  require_once "php/conexionP.php";
  $conexionP=conexionP();



$id=$_GET['id'];
$sql5=mysqli_query($conexionP, "SELECT * FROM articulos WHERE codArt=$id");
$result_sql5=mysqli_num_rows($sql5);

  while($data5 = mysqli_fetch_array($sql5)){
    $codArtu = $data5['codArt'];
    $descripu = $data5['Descripcion'];
    $Stocku= $data5['Stock'];
    $idtipoa = $data5['idTipoA'];
    $idunidadA=$data5['idUnidad'];
    $iddeposito=$data5['idDeposito'];
    $idestanteria=$data5['idEstanteria'];
  } 


$sql6=mysqli_query($conexionP,"SELECT * FROM estanterias WHERE idEstanteria=$idestanteria");
$result_sql6=mysqli_num_rows($sql6);

  while($data6 = mysqli_fetch_array($sql6)){
    $hola= $data6['fila'];
    $columna = $data6['columna'];
  } 


  if(isset($_POST['editar'])){
  $id=$_GET['id'];
  $codigoE = $_POST['codigoE'];
  $DescripcionE = $_POST['DescripcionE'];
  $tipoE = $_POST['tipoE'];
  $stockE = $_POST['stockE'];
  $unidadE = $_POST['unidadE'];
  $depositosE = $_POST['depositosE'];
  $filaE = $_POST['filaE'];
  $columnaE = $_POST['columnaE'];
  

  $sql25 = "UPDATE articulos SET codArt='".$codigoE ."',
  Descripcion='".$DescripcionE."', 
  idTipoA='".$tipoE."',
  Stock='".$stockE."',
  idUnidad='".$unidadE."',
  idDeposito='".$depositosE."'
  WHERE codArt='".$id."' ";
    $query25 = mysqli_query($conexionP,$sql25);
    

$sql26 = "UPDATE estanterias SET fila='".$filaE ."',
  columna='".$columnaE."'
  WHERE idEstanteria='".$idestanteria."' ";
    $query26 = mysqli_query($conexionP,$sql26);


  if(!$query25){
    die("fallo");


  }


  header('Location: index.php');
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
              <h3 class="box-title">Editar Articulos</h3>
            </div>
           <form action="" method="POST">
            <div class="box-body">
                
                <div class="form-group">
                  <label>Codigo</label>
                  <input name="codigoE" id="codigoE" type="text" class="form-control" value="<?php echo $codArtu?>">
                </div>

                <div class="form-group">
                  <label>Descripcion</label>
                  <input name="DescripcionE" id="DescripcionE" type="text" class="form-control" value="<?php echo $descripu?>">
                </div>

               <div class="form-group">
                  <label>Tipo
                        </label>

                      <?php
        $query_tip = mysqli_query($conexionP,"SELECT * FROM tipoarticulo");
                  ?>

    <select id="tipoE" class="form-control" name="tipoE" >
    <?php while ($fila = $query_tip->fetch_assoc()): ?>
                                      
     <?php $atributo = ($fila['idTipoA'] == $idtipoa) ? 'selected' : '' ?>
      
   <?php echo "<option value='".$fila['idTipoA']."'".$atributo.">".$fila['Descripcion']. "</option>" ?>
                                    
     <?php endwhile; ?>
    </select>

        
</div>



                <div class="form-group">
                  <label>Stock</label>
                  <input name="stockE" id="stockE" type="text" class="form-control" value="<?php echo $Stocku?>">
                </div>
                
<div class="form-group">
                  <label>Unidad
                        </label>

                      <?php
        $query_uni = mysqli_query($conexionP,"SELECT * FROM unidad");
                  ?>

    <select id="unidadE" class="form-control" name="unidadE" >
    <?php while ($fila = $query_uni->fetch_assoc()): ?>
                                      
     <?php $atributo = ($fila['idUnidad'] == $idtunidadA) ? 'selected' : '' ?>
      
   <?php echo "<option value='".$fila['idUnidad']."'".$atributo.">".$fila['Descripcion']. "</option>" ?>
                                    
     <?php endwhile; ?>
    </select>

        
</div>

<div class="form-group">
                  <label>Deposito
                        </label>

                      <?php
        $query_dep = mysqli_query($conexionP,"SELECT * FROM depositos");
                  ?>

    <select id="depositosE" class="form-control" name="depositosE" >
    <?php while ($fila = $query_dep->fetch_assoc()): ?>
                                      
     <?php $atributo = ($fila['idDeposito'] == $iddeposito) ? 'selected' : '' ?>
      
   <?php echo "<option value='".$fila['idDeposito']."'".$atributo.">".$fila['Descripcion']. "</option>" ?>
                                    
     <?php endwhile; ?>
    </select>

        
</div>

<div class="form-group">
                  <label>Fila</label>
                  <input name="filaE" id="filaE" type="text" class="form-control" value="<?php echo $hola?>">
                </div>


                <div class="form-group">
                  <label>Columna</label>
                  <input name="columnaE" id="columnaE" type="text" class="form-control" value="<?php echo $columna?>">
                </div>






              <div class="box-footer">
                <input type="submit" class="btn btn-block btn-info" calss="text-center" name="editar" value="Guardar">

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