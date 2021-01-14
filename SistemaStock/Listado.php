<?php 
 require_once 'lib/pdf/autoload.inc.php';
  ob_start();


   
  require_once "php/conexionP.php";
  $conexionP=conexionP();


        ?>

  <html>
  <body>

  <head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">



  <title>Tabla</title>
  
  
   <link rel="stylesheet" href="style.css">
   
  
  
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
#centro{
  text-align: center;
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

    

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <h1>Listado De Registros</h1>
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Materiales Dañados
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
              <th>Oservaciones</th>
              
              <th>Fecha de Baja</th>
            </tr>
            </thead>
            <tbody>
            <?php
                        $Reporte22="SELECT a.codArt, a.descripcion, m.CantidadM, m.Observaciones,m.FechaRegistro
                         FROM modificacioes m
                        inner join articulos a on m.codart=a.codart
                        WHERE m.Motivo='Rotura' 
                        GROUP by m.idModificacion ";
                        $resultRepo22=mysqli_query($conexionP,$Reporte22);

                        while ($rowrepo22 = mysqli_fetch_array($resultRepo22)){ 

                         ?>                                                      
                          <tr>
                          <td class="text-center"><?php echo $rowrepo22[0]?></td>
                          <td class="text-center"><?php echo $rowrepo22[1]?></td>
                          <td class="text-center"><?php echo $rowrepo22[2]?></td>
                          <td class="text-center"><?php echo $rowrepo22[3]?></td>
                          <td class="text-center"><?php echo $rowrepo22[4]?></td>
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