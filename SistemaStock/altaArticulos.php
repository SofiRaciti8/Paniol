<?php 
  require_once "php/conexionP.php";
  $conexionP=conexionP();
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
          
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo Articulo</h3>
            </div>
           <form action="php/garticulos.php" method="POST">
            <div class="box-body">
                
              
                <div class="form-group">
                  <label>Codigo</label>
                  <input name="codigo" id="codigo" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Descripcion</label>
                  <input name="Descripcion" id="Descripcion" type="text" class="form-control">
                </div>

                <div class="form-group">
                  <label for="tipo">Tipo</label>
                  <?php
                  $query_tipoq = mysqli_query($conexionP,"SELECT * FROM tipoarticulo");
                  $resul_tipoq = mysqli_num_rows($query_tipoq);
                  ?>
                  <select name="tipo" id="tipo" class="form-control">
                    <option value="" selected disabled>Seleccionar Tipo</option>
                 <?php
                 if($query_tipoq > 0)
                 {
                  while ($tipoq = mysqli_fetch_array($query_tipoq)) {
                 ?>
                 <option value="<?php echo $tipoq["idTipoA"]; ?>"><?php echo $tipoq["Descripcion"]?></option>
                 <?php 
             }
         }
         ?>
             </select>
                  
                </div>



                <div class="form-group">
                  <label>Cantidad</label>
                  <input name="cantidad" id="cantidad" type="text" class="form-control">
                </div>
                

                <div class="form-group">
                  <label for="unidad">Unidad</label>
                  <?php
                  $query_tipouni = mysqli_query($conexionP,"SELECT * FROM unidad");
                  $resul_tipouni= mysqli_num_rows($query_tipouni);
                  ?>
                  <select name="unidad" id="unidad" class="form-control">
                    <option value="" selected disabled>Seleccionar Uniadad</option>
                 <?php
                 if($query_tipouni > 0)
                 {
                  while ($tipouni = mysqli_fetch_array($query_tipouni)) {
                 ?>
                 <option value="<?php echo $tipouni["idUnidad"]; ?>"><?php echo $tipouni["Descripcion"]?></option>
                 <?php 
             }
         }
         ?>
             </select>
                  
                </div>

               <div class="form-group">
                  <label for="deposito">Deposito</label>
                  <?php
                  $query_tipodepo = mysqli_query($conexionP,"SELECT * FROM depositos");
                  $resul_tipoudepo= mysqli_num_rows($query_tipodepo);
                  ?>
                  <select name="deposito" id="deposito" class="form-control">
                    <option value="" selected disabled>Seleccionar Depsito</option>
                 <?php
                 if($query_tipodepo > 0)
                 {
                  while ($tipodepo = mysqli_fetch_array($query_tipodepo)) {
                 ?>
                 <option value="<?php echo $tipodepo["idDeposito"]; ?>"><?php echo $tipodepo["Descripcion"]?></option>
                 <?php 
             }
         }
         ?>
             </select>
                  
                </div>

                <div class="form-group">
                  <label>Fila</label>
                  <input name="fila" id="fila" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Columna</label>
                  <input name="columna" id="columna" type="text" class="form-control">
                </div>


              <div class="box-footer">
                <input type="submit" class="btn btn-block btn-success" calss="text-center" name="guardarrr" value="Guardar">

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
<script src="dist/js/demo.js"></script>
    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
    })
  })
</script>