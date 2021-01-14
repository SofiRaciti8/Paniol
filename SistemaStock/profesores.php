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
          
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Nuevo Profesor</h3>
            </div>
           <form action="php/gprofesores.php" method="POST">
            <div class="box-body">
                
              
                <div class="form-group">
                  <label>Nombre</label>
                  <input name="profe" id="profe" type="text" class="form-control">
                </div>

              <div class="box-footer">
                <input type="submit" class="btn btn-block btn-warning" calss="text-center" name="guardarm" value="Guardar">

              </div>
            </form>
          </div>

</section>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
          

          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Profesores</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                  
                  <th>Nombre</th>
                 <th>Acciones</th>
                  

                </tr>
                </thead>
                <tbody>
                        <?php 
                        $u="SELECT * FROM profesores where estado=1";
                        $resultu=mysqli_query($conexionP,$u);

                        while ($rowu = mysqli_fetch_array($resultu)) { ?>
                          <tr>
                            <td><?php echo $rowu['Nombre']?></td>
                           <td>

                            <a href="editarProfesor.php?id=<?php echo $rowu['idProfesor']?>"><button type="button" class="btn btn btn-warning" data-toggle="modal" data-target="#modal-info">Editar</button></a>

                            <a href="BajaProfesor.php?id=<?php echo $rowu['idProfesor']?>"><button type="button" class="btn btn btn-danger" data-toggle="modal" data-target="#modal-info">Eliminar</button></a>



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