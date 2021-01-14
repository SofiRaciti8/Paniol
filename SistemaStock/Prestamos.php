
 <?php 
  require_once "php/conexionP.php";
  $conexionP=conexionP();

  $id=$_GET['id'];
  $var=$_REQUEST['cant'];
  $P="P";

  $sql3="SELECT *
            from articulos where Estado=1";
            $result3=mysqli_query($conexionP,$sql3);

            $sql4="SELECT * from profesores";
            $result4=mysqli_query($conexionP,$sql4);
 ?>

<?php
include('template.php'); 
?>

<?php


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="js/Notify.js"></script>
  <title>Tabla</title>
  
   <link rel="stylesheet" href="custose.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="librerias/select2/js/select2.js"></script>
  
</head>


<section class="content center">
      <div class="row" class="center">
        <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Registro Articulos</h3>
            </div>
           <form action="php/GuardarMovimiento.php" method="POST">

                      <?php
                
                      for ($i=0; $i < $var ; $i++) { 
                      ?>
                    
                          <input type="hidden" name="idprestamo[]" id="idsoc"class="form-control col-md-7 col-xs-12" value="<?php echo $id; ?>" required>
                        

            <div class="box-body">
                <div class="form-group">
                  <label for="codArt">Articulo <?php echo $i+1; ?></label>
                  <?php
                  $query_cod3 = mysqli_query($conexionP,"SELECT codArt, Descripcion FROM articulos order by Descripcion");
                  $resul_cod3= mysqli_num_rows($query_cod3);
                  ?>
                  <select name="codArt[]" id="codArt" class="form-control">
                        <?php
                 if($query_cod3 > 0)
                 {
                  while ($codigo = mysqli_fetch_array($query_cod3)) {
                 ?>
                 <option value="<?php echo $codigo["codArt"]; ?>"><?php echo $codigo["Descripcion"]?></option>
                 <?php 
             }
         }
         ?>
            </select>
          </div>
              

                <input type="hidden" name="iDtipo[]" id="iDtipo"class="form-control col-md-7 col-xs-12" value="<?php echo $P; ?>" required>

                <div class="form-group">
                  <label>Cantidad</label>
                  <input name="cantid[]" id="cantid" type="number" class="form-control" placeholder="cantidad" >
                </div>
                </div>



   <?php 
        }  ?>

                

              <div class="box-footer">
                <input type="submit" class="btn btn-block btn-primary" calss="text-center" name="guardarm" value="Guardar">

              </div>
            </form>
          </div>
     




     