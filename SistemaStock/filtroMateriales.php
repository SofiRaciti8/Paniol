<?php 

require_once 'lib/pdf/autoload.inc.php';
  ob_start();

  require_once "php/conexionP.php";
  $conexionP=conexionP();

if(isset($_POST['buscarmateriales'])){
          $buscarm='';
  
      $fecha_desdem=$_POST['fecha_desdem'];
      $fecha_hastam=$_POST['fecha_hastam'];



     

      }

      if(empty($fecha_desdem) || empty($fecha_hastam)){

        header('Location: reportes1.php ');
       
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
    width: 85%;
  text-align: center;
  font-size: 50px;
  background: #F9A8F4;
}
</style>


<style type="text/css">
  .page-header{
    width: 80%;
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
        <h2 class="page-headerr">
        Materiales Más Solicitados</h2>
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

        <h2 id="centro">Desde: <?php echo $fecha_desdem?> Hasta: <?php echo $fecha_hastam ?></h2>
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
               
         
            </tr>
            </thead>
            <tbody>
            <?php
        $Reporte21="SELECT a.codArt,sum(p.Cantid), a.Descripcion from prestamos p INNER JOIN articulos a on a.codArt=p.codArt where date(p.FechaRegistro)  BETWEEN '$fecha_desdem' and '$fecha_hastam' GROUP by p.codArt ORDER by sum(p.Cantid) DESC LIMIT 5";
                        $resultRepo21=mysqli_query($conexionP,$Reporte21);

                        while ($rowrepo21 = mysqli_fetch_array($resultRepo21)){ 

                         ?>                                                      
                          <tr>
                            <td class="text-center"><?php echo $rowrepo21[0]?></td>
                            <td class="text-center"><?php echo $rowrepo21[1]?></td>
                            <td class="text-center"><?php echo $rowrepo21[2]?></td>
                           
                            
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