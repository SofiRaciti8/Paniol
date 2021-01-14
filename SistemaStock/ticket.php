<?php 
require_once 'lib/pdf/autoload.inc.php';
  ob_start();

  require_once "php/conexionP.php";
  $conexionP=conexionP();
  $idmov=$_REQUEST['id'];
        ?>
        
  <html>
  <head>

  <link rel="stylesheet" href="style2.css">
  

 </head>
 <style type="text/css">
  .page-headerrr{
  text-align: center;
  font-size: 50px;
  background: #ABAFF7;
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

h1{
  width: 85%;
}
</style>


  <body>

   <section class="content-header">
     
      
    </section>

    

    <!-- Main content -->
   <section class="invoice">
   
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-headerrr">
            <i class="fa fa-globe"></i> Prestamo
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <br>
      <br>

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tbody>

            <tr>
             <th>Codigo</th>
              <th>Descripcion</th>
              
              <th>Cantidad</th>
            </tr>
            </thead>
            <tbody>
            <?php
            
                        $reporteCr="SELECT p.idMovimiento,a.codArt, a.Descripcion, l.Nombre,r.Alumno,p.Cantid,p.FechaRegistro,p.estado FROM prestamos p INNER JOIN registroprestamos r ON  p.idPrestamo=r.idPrestamo
                          INNER JOIN articulos a ON a.codArt=p.codArt
                          INNER JOIN profesores l ON l.idProfesor=r.idProfesor WHERE p.idPrestamo=$idmov";
                          $vecresult=mysqli_query($conexionP, $reporteCr);
                        
                     while ($filaReporte= mysqli_fetch_array($vecresult)){ 
                        $profesor=$filaReporte[3];
                        $alumno=$filaReporte[4];
                        $fecha=$filaReporte[6];
                       
                         ?>                                                      
                    <tr>
                       <td class="text-center"><?php echo $filaReporte[1]?></td>
                       <td class="text-center"><?php echo $filaReporte[2]?></td>
                       
                       <td class="text-center"><?php echo $filaReporte[5]?></td>
                       </tr>
         
                        <?php } ?>
                     
                    
           
            </tbody>

          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      </tbody>
    </thead>
  </table>


</div>
</div>
<br>
<br>
<br>

<h1 class="comunicado">
  Los materiales mencionados anteriormente quedan a cuidado y responsabilidad del profesor/a <?php echo $profesor?>. <br>
  Estos materiales fueron retirados por el alumno <?php echo $alumno ?> en la fecha y hora <?php echo $fecha ?>
  <br>

  Firma Resposable:
          <br>
         
         </h1>
        </h1>
</section>

      <!-- /.row -->

      

  
</div>
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
