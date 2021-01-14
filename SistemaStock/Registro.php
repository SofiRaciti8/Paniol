<?php 
  require_once "php/conexionP.php";
  $conexionP=conexionP();

 

            $sql4="SELECT * from profesores";
            $result4=mysqli_query($conexionP,$sql4);
 ?>



<?php
include('template.php'); 
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
              <h3 class="box-title">Registro de Prestamos</h3>
            </div>
           <form action="Prestamos.php" method="POST">
             <div class="box-body">

                <div class="form-group">
                  <label for="idProfesor">Profesor Responsable</label>
                  <?php
                  $query_cod4 = mysqli_query($conexionP,"SELECT idProfesor,Nombre FROM profesores order by Nombre");
                  $resul_cod4= mysqli_num_rows($query_cod4);
                  ?>
                  <select name="idProfesor" id="idProfesor" class="form-control" required>
                    <div id="codigo"></div>
                  
                  <option value="0" >Buscar</option>
                  
      <?php
        while($verp4=mysqli_fetch_row($result4)): 
       ?>
        <option value="<?php echo $verp4[0] ?>">
          <?php echo $verp4[1] ?>
        </option>

      <?php endwhile; ?>
            </select>
          </div>
                
                <div class="form-group">
                  <label>Alumno</label>
                  <input name="alumno" id="alumno" type="text" class="form-control" placeholder="Alumno">
                </div>
                <div class="form-group">
                  <label>Cantidad de Articulos</label>
                  <input name="cantidadd" id="cantidadd" type="number" class="form-control" placeholder="cantidad" >
                </div>

              <div class="box-footer">
                <input type="submit" class="btn btn-block btn-primary" calss="text-center" name="guardarm" value="Guardar">

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
    $('#codig').load('Prestamos.php');
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){
      $('#idProfesor').select2({
    width: '100%'
});

      $('#idProfesor').change(function(){
        $.ajax({
          type:"post",
          data:'valor=' + $('#idProfesor').val(),
          url:'php/crearsession.php',
          
        });
      });
    });


  </script>

          <script type="text/javascript">
  $(document).ready(function(){
    $('#codigo').load('Registro.php');
  });
</script>



  