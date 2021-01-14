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
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
</head>
<section class="content center">
      <div class="row" class="center">
        <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
          
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Nueva Unidad</h3>
            </div>
           <form action="php/gunidad.php" method="POST">
            <div class="box-body">
                
                <div class="form-group">
                  <label>Abreviatura</label>
                  <input name="abre" id="Profe" type="text" class="form-control">
                </div>

                <div class="form-group">
                  <label>Nombre</label>
                  <input name="nombreunidad" id="Profe" type="text" class="form-control">
                </div>

              <div class="box-footer">
                <input type="submit" class="btn btn-block btn-danger" calss="text-center" name="guardarm" value="Guardar">

              </div>
            </form>
          </div>

</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
          

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Unidades</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>Abreviarura</th>
                  <th>Nombre</th>
                 <th>Acciones</th>
                  

                </tr>
                </thead>
                <tbody>
                        <?php 
                        $u="SELECT * FROM unidad";
                        $resultu=mysqli_query($conexionP,$u);

                        while ($rowu = mysqli_fetch_array($resultu)) { ?>
                          <tr>
                            <td><?php echo $rowu['idUnidad']?></td>
                            <td><?php echo $rowu['Descripcion']?></td>
                           <td>
                    <button type="button" class="btn btn btn-warning" data-toggle="modal" data-target="#modal-warning">Edit</button>
                    <button type="button" class="btn btn btn-danger" data-toggle="modal" data-target="#modal-danger">Elim</button>


                  </td>
                 
                          </tr>
         
                        <?php } ?>
                     
             
                  
                </tr>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
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