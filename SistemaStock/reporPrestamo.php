<?php 
 require_once 'lib/pdf/autoload.inc.php';
  ob_start();


   
  require_once "php/conexionP.php";
  $conexionP=conexionP();
  
  $idmov=$_GET['id'];


include('template.php'); 
        ?>
  <html>
  <body>
   <section class="content-header">
     
      
    </section>

    

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-headerr">
            <i class="fa fa-globe"></i> Materiales más solicitados
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
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
              <th>Cantidad de Pedidos</th>
              <th>Unidad</th>
              
              
            </tr>
            </thead>
            <tbody>
            <?php
                        $Reporte99="SELECT p.idMovimiento,a.codArt, a.Descripcion, l.Nombre,r.Alumno,p.Cantid,p.FechaRegistro,p.estado FROM prestamos p, registroprestamos r, articulos a INNER JOIN profesores l where l.idProfesor=r.idProfesor and a.codArt=p.codArt and p.idPrestamo=r.idPrestamo and p.idPrestamo=$idmov GROUP by p.idMovimiento ";
                        $resultRepo99=mysqli_query($conexionP,$Reporte99);

                       while ($rowrepo99[] = mysqli_fetch_array($resultRepo99)){ 

                         ?>                                                      
                          <tr>
                            <td class="text-center"><?php echo $rowrepo99[0]?></td>
                            
                            <td class="text-center"><?php echo $rowrepo99[2]?></td>
                            
                            <td class="text-center"><?php echo $rowrepo99[1]?></td>
                             <td class="text-center"><?php echo $rowrepo99[3]?></td>
                          
                            
                         
                          
                    
                 
                          </tr>
         
                        <?php } ?>
                     
             
           
            </tbody>

          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      <!-- /.row -->

      

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