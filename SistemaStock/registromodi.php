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

 
    <!-- Content Header (Page header) -->
    <section class="content-header">
   
    
      
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
          

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Registro de Ingresos y Egresos de Articulos</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                  
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Cantidad</th>
                  <th>Motivo</th>
                  <th>Observaciones</th>
                  <th>Fecha Registro</th>
           
  
                </tr>
                </thead>
                <tbody>
               
                        <?php 
                        $CONsulta="SELECT m.codArt, a.Descripcion, m.CantidadM, m.motivo, m.observaciones, m.FechaRegistro FROM modificacioes m INNER JOIN articulos a on m.codArt=a.codArt GROUP by m.idModificacion";
                        $resultado=mysqli_query($conexionP,$CONsulta);

                        while ($rowu = mysqli_fetch_array($resultado)) { ?>
                          <tr>
                            <td><?php echo $rowu[0]?></td>
                            <td><?php echo $rowu[1]?></td>

                            <td><?php echo $rowu[2]?></td>
                            <td><?php echo $rowu[3]?></td>
                            <td><?php echo $rowu[4]?></td>


                            <td><?php echo $rowu[5]?></td>

                    

                 
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