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
<style type="text/css">
  .page-headerr{
  text-align: center;
  font-size: 50px;
  background: #F9A8F4;
}
</style>


<style type="text/css">
  .page-header{
  text-align: center;
  font-size: 50px;
  background: #84F4E9;
}

.jaja{
  border-radius: 10px;
  border-color: #84F4E9;
}

.ja{
  border-radius: 10px;
  border-color: #F9A8F4;
}
.btn-orange{
  background: #F9A8F4;

}
</style>
<section class="content-header">
     
      
    </section>
<section class="invoice">
   

    <div class="pad margin">
      <div style="margin-bottom: 0!important;">
        <h2 class="page-headerr">
        Materiales más solicitados</h2>
      </div>
    </div>


    <!-- Main content -->
     <h3>Buscar por fecha</h3>
        
          
        <section class="invoice">
          <div class="text-center">
             <form action="filtroMateriales.php" method="POST" target="_blank" >
          <h4>Desde: <input type="date" class="ja" name="fecha_desdem"> Hasta : <input type="date" class="ja" name="fecha_hastam"></h4> <button class="btn btn-primary mb1 bg-fuchsia" name="buscarmateriales"> <i class="fa fa-download"></i>     Generar PDF</button>
        </form>
          </div>
        </section>

        <br>
      <!-- title row -->
      
        <!-- /.col -->
        
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
      
        <!-- /.col -->
     
      <br>
      <br>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tbody>

            <tr>
             <th class="text-center">Codigo</th>
              <th class="text-center">Descripcion</th>
              <th class="text-center">Mayor Cantidad</th>
            <th class="text-center">Unidad</th>
            
            </tr>
            </thead>
            <tbody>
            <?php
                        $Reporte2="SELECT a.codArt,sum(p.Cantid), a.Descripcion, u.Descripcion from prestamos p INNER JOIN articulos a on a.codArt=p.codArt  INNER JOIN unidad u on u.idUnidad=a.idUnidad GROUP by p.codArt ORDER by sum(p.Cantid) DESC LIMIT 10";
                        $resultRepo2=mysqli_query($conexionP,$Reporte2);

                        while ($rowrepo2 = mysqli_fetch_array($resultRepo2)){ 

                         ?>                                                      
                          <tr>
                            <td class="text-center"><?php echo $rowrepo2[0]?></td>
                            
                            <td class="text-center"><?php echo $rowrepo2[2]?></td>
                            
                            <td class="text-center"><?php echo $rowrepo2[1]?></td>
                            <td class="text-center"><?php echo $rowrepo2[3]?></td>
                            
                         
                          
                    
                 
                          </tr>
         
                        <?php } ?>
                     
             
                  
                </tr>
                </tbody>
           
             
           
            </tbody>

          </table>
        </div>
        <!-- /.col -->
      </div>
      
      <!-- /.row -->

      
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
         
          <a href="Materiales.php" target="_blank"><button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generar PDF
          </button></a>
        </div>
      </div>
    </section>

    <section class="content-header">
     
      
    </section>

    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Escuela De Educación Secundaria Técnica N°1</strong>
  </footer>


  <div class="control-sidebar-bg"></div>
</div>

</body>
</html>



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