



<?php 
 require_once 'lib/pdf/autoload.inc.php';
  ob_start();


   
  require_once "php/conexionP.php";
  $conexionP=conexionP();
        ?>
        
  <html>
  <head>

  <link rel="stylesheet" href="style2.css">
  

 </head>
 <style type="text/css">
  .page-headerr{
    width: 80%;
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

h1{
  width: 80%;
}
</style>


  <body>

   <section class="content-header">
     
      
    </section>

    

    <!-- Main content -->
   <section class="invoice">
    <h1>Listado De Registros</h1>
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-headerr">
            <i class="fa fa-globe"></i> Materiales Más Solicitados
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
              <th>Mayor Cantidad</th>
              <th>Unidad</th>
              
              
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