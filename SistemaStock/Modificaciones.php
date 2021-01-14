<?php 
  
  require_once "php/conexionP.php";
  $conexionP=conexionP();

 ?>
 <?php 
  require_once "php/conexionP.php";
  $conexionP=conexionP();

  $sql="SELECT *
            from articulos where Estado=1";
            $result=mysqli_query($conexionP,$sql);
 ?>
<?php
include('template.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 <link rel="stylesheet" href="custose.css">
  <title>Tabla</title>
  
  
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

  <script src="librerias/select2/js/select2.js"></script>
  
</head>
<section class="content center">
      <div class="row" class="center">
        <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
          
          <div class="box box-info center">
            <div class="box-header with-border text-center">

              <h3 class="box-title">Modificaciones INGRESOS-BAJA de Articulos</h3>
            </div>
            <form action="php/GuardarM.php" method="POST">
          
               <div class="box-body">
                <div class="form-group">
                  <label for="codArt">Producto</label>
                  <?php
                  $query_cod = mysqli_query($conexionP,"SELECT codArt, Descripcion FROM articulos");
                  $resul_cod= mysqli_num_rows($query_cod);
                  ?>
                  <select name="codArt" id="codArt" class="form-control" required>
                    <div id="codig"></div>
                  


                  <option value="0" >Buscar</option>
                  
      <?php
        while($verp=mysqli_fetch_row($result)): 
       ?>
        <option value="<?php echo $verp[0] ?>">
          <?php echo $verp[0]." ".$verp[1] ?>
        </option>

      <?php endwhile; ?>
                
                
             
                  </select>
                </div>
                <div class="form-group">
                  <label for="iDtipo">Tipo</label>
                  <?php
                  $query_tipo = mysqli_query($conexionP,"SELECT * FROM tiposmov where iDtipo='B' or iDtipo='I'");
                  
                  ?>
                  <select name="iDtipo" id="iDtipo" class="form-control">
                  <option value="" selected disabled>Seleccionar Tipo</option>
                 <?php
                 if($query_tipo > 0)
                 {
                  while ($tipo = mysqli_fetch_array($query_tipo)) {
                 ?>
                 <option value="<?php echo $tipo["iDtipo"]; ?>"><?php echo $tipo["Descripcion"]?></option>
                 <?php 
             }
         }
         ?>
             </select>
                  
                </div>
                 <div class="form-group">
                  <label>Cantidad</label>
                  <input type="number" name="CantidadM" id="CantidadM" class="form-control" placeholder="Cantidad" required>
                </div>

                

                

                <div class="form-group">
                  <label>Motivo</label>
                   <select name="motivo" id="motivo" class="form-control">
                  <option value="" selected disabled>Seleccionar Motivo</option>
                  <option value="Compra">Compra</option>
                  <option value="Donacion">Donación</option>
                  <option value="Rotura">Rotura</option>
                  <option value="otro">Otro (indicar en observaciones)</option>
             </select>
                </div>

                <div class="form-group">
                  <label>Observaciones</label>
                  <input type="text" class="form-control" name="observaciones" id="motivo" rows="1" placeholder="Observaciones" required>
                </div>

                
            </div>

               
             <div class="box-footer">
            <input type="submit" class="btn btn-block btn-info" calss="text-center" name="guardar" value="Guardar">
              
                        
              </div>
            </form>
          </div>

    <script type="text/javascript">
    $(document).ready(function(){
      $('#codArt').select2();

      $('#codArt').change(function(){
        $.ajax({
          type:"post",
          data:'valor=' + $('#codArt').val(),
          url:'php/crearsession.php',
          
        });
      });
    });
  </script>

  <script type="text/javascript">
  $(document).ready(function(){
    $('#codig').load('Modificaciones.php');
  });
</script>