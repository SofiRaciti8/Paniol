

<?php 

require_once 'lib/pdf/autoload.inc.php';
  ob_start();

  require_once "php/conexionP.php";
  $conexionP=conexionP();

if(isset($_POST['buscarrotos'])){
          $buscar='';
  
      $fecha_desde=$_POST['fecha_desde'];
      $fecha_hasta=$_POST['fecha_hasta'];

      }

      if(empty($fecha_desde) || empty($fecha_hasta)){

        header('Location: reportes2.php ');
       
      }

     ?>




<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">



  <title>Tabla</title>
  
  
   <link rel="stylesheet" href="style.css">
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
    width: 85%;
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

table {
  width: 85%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
  
}

h1{
  width: 85%;
}
</style>
<section class="content-header">
     
      
    </section>

<section class="invoice">
  

    <div class="pad margin">
      <div style="margin-bottom: 0!important;">
        <h2 class="page-header">
        Materiales Dañados</h2>
      </div>
    </div>



    <!-- Main content -->
    
      <!-- title row -->
      <div class="row">
       
        <!-- /.col -->
      </div>
      
      <!-- info row -->
      

        <!-- /.col -->
        <h1>
        Registro de Materiales encontrados
      </h1>

        <h2 id="centro">Desde: <?php echo $fecha_desde ?> Hasta: <?php echo $fecha_hasta ?></h2>
        <br>
        
          
        
      
      
        <!-- /.col -->
     
      
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
              <th class="text-center">Cantidad</th>
              <th class="text-center">Observaciones</th>
              <th class="text-center">Fecha de Baja</th>
              
            </tr>
            </thead>
            <tbody>
            <?php
                        $Reporte2="SELECT a.codArt, a.descripcion, m.CantidadM, m.Observaciones,m.FechaRegistro
                         FROM modificacioes m
                        inner join articulos a on m.codart=a.codart
                        WHERE m.Motivo='Rotura' AND date(m.FechaRegistro) BETWEEN '$fecha_desde' AND '$fecha_hasta'
                        GROUP by m.idModificacion";
                        $resultRepo2=mysqli_query($conexionP,$Reporte2);

                        while ($rowrepo2 = mysqli_fetch_array($resultRepo2)){ 

                         ?>                                                      
                          <tr>
                            <td class="text-center"><?php echo $rowrepo2[0]?></td>
                            <td class="text-center"><?php echo $rowrepo2[1]?></td>
                            <td class="text-center"><?php echo $rowrepo2[2]?></td>
                            <td class="text-center"><?php echo $rowrepo2[3]?></td>
                            <td class="text-center"><?php echo $rowrepo2[4]?></td>
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

     </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->
  
 


  <div class="control-sidebar-bg"></div>
</div>

</body>
</html>





<?php
  //buffering of html code
  $output = ob_get_clean();

  // reference the Dompdf namespace
  use Dompdf\Dompdf;

  // instantiate and use the dompdf class
  $dompdf = new Dompdf();
  $dompdf->loadHtml($output);

  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'portrait');

  // Render the HTML as PDF
  $dompdf->render();

  // Output the generated PDF to Browser
  $filename = "PDFcedulaPH-2.pdf";
  $dompdf->stream($filename, array("Attachment" => 0));
 ?>