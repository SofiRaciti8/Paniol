

<?php
include("php/conexionP.php");
  $conexionP=conexionP();

  $ULTIMO=mysqli_query($conexionP, "SELECT idRegistro FROM registro order by idRegistro desc LIMIT 1");

 
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>App Stock</title>
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="custose.css">
 
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="custose.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  
<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <header class="main-header">

    
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>EST</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>P</b>añol</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Herramientas</span>
      </a>


      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            
            <ul class="dropdown-menu">
              
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 100%" role="progressbar"
                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="php/logout.php" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="images/logo.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Cerrar Session</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="images/logo.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user->getNombre();?>
                </p>
              </li>
              <!-- Menu Body -->
               <li class="user-footer">
                <form action="" method="POST">
                <div class="text-center">

                  <a href="php/logout.php" name="salir" class="btn btn-default btn-flat">Salir</a>
                </div>
                </form>
              </li>
            </ul>
          </li>

          <?php 

          if (isset($_POST['salir'])){
            $codre='27';
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $fechadeslogeo=date('Y-m-d H:i:s');
      $sql25uf = "UPDATE registro SET FechaYHoraDeslogeo='".$fechadeslogeo ."'
            WHERE idRegistro='".$codre."' ";
          $query25uf = mysqli_query($conexionP,$sql25uf);
          }

          ?>
              <!-- Menu Footer-->
            
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/logo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Bienvenido</p>
          <p class="text-center"><?php echo $user->getNombre();?></p>
        </div>
      </div>
      
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de navegacion</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Inventario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php"><i class="fa fa-circle-o"></i>Administracion</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Movimientos</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Registro.php"><i class="fa fa-circle-o"></i>Nuevo Movimiento</a></li>
            <li><a href="registroMov.php"><i class="fa fa-circle-o"></i>Listado de Prestamos</a></li>
            
         
          </ul>
        </li>
        <li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Modificaciones</span>
            <span class="pull-right-container">
             
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Modificaciones.php"><i class="fa fa-circle-o"></i>Nueva Modificación</a></li>
            <li><a href="registroModi.php"><i class="fa fa-circle-o"></i>Modificaciones Realizadas</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="reportes1.php"><i class="fa fa-circle-o"></i>Materiales mas Solicitados</a></li>
            <li><a href="reportes2.php"><i class="fa fa-circle-o"></i>Materiales Dañados</a></li>
           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i>
            <span>Configuración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profesores.php"><i class="fa fa-circle-o"></i>Profesores</a></li>

             <!-- /.<li><a href="unidades.php"><i class="fa fa-circle-o"></i>Unidades</a></li> -->
            <li><a href="depositos.php"><i class="fa fa-circle-o"></i>Depositos</a></li>
            <!-- /.<li><a href="tipoarticulo.php"><i class="fa fa-circle-o"></i>Tipo de Articulos</i></a></li>-->
             <!-- /.<li><a href="tipomovimiento.php"><i class="fa fa-circle-o"></i>Tipo de Movimientos</i></a></li>-->
          </ul>
        </li>
        
          
        <li>
          
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inventario
    
        
      </h1>
      <br>
     <a href="altaArticulos.php"><button type="button" class="btn-success btn">
                Agregar Articulo
              </button></a>

              
    </section>

   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box" id="bpx">
            <div class="box-header">
              <h3 class="box-title">Herramientas</h3>
            </div>
            <!-- /.box-header -->
            <div class="table-responsive">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped whidt=100%">
               <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Descripción</th>
                  <th>Tipo</th>
                 <th>Stock</th>
                 <th>Unid</th>
                  <th>Deposito</th>
                  <th>Fila</th>
                  <th>Colum</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                        $ppp="SELECT A.codArt,A.Descripcion,T.Descripcion,A.Stock,U.Descripcion,D.Descripcion,E.fila,E.columna FROM articulos A INNER JOIN tipoarticulo T ON T.idTipoA=A.idTipoA
                        INNER JOIN unidad u ON u.idUnidad=A.idUnidad
                        INNER JOIN depositos D ON D.idDeposito=a.idDeposito
                        INNER JOIN estanterias E ON E.idEstanteria=A.idEstanteria
                        where A.Estado=1 and A.Stock>0";
                        $resultppp=mysqli_query($conexionP,$ppp);

                        while ($rowUNO = mysqli_fetch_array($resultppp))  {
                         ?>                                                      
                          <tr>
                            <td><?php echo $rowUNO[0]?></td>
                            <td><?php echo $rowUNO[1]?></td>
                            <td><?php echo $rowUNO[2]?></td>
                            <td><?php echo $rowUNO[3]?></td>
                           
                            <td><?php echo $rowUNO[4]?></td>
                            <td><?php echo $rowUNO[5]?></td>
                            <td><?php echo $rowUNO[6]?></td>
                            <td><?php echo $rowUNO[7]?></td>

                           <td>
                            
                    <a href="editarArticulo.php?id=<?php echo $rowUNO['codArt']?>"><button type="button" class="btn btn btn-info" data-toggle="modal" data-target="#modal-info">Editar</button></a>
                    
                    
                  </td>
                 
                          </tr>
         
                        <?php } ?>
                     
             
                  
                </tr>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Escuela De Educación Secundaria Técnica N°1</strong>
  </footer>

  <!-- Control Sidebar -->
 <style type="text/css">
#modal-success{
    margin: 2px;
    margin-top: 2px;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
}
</style>




<!-- Latest minified bootstrap js -->





<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>


<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->


</body>
</html>
<script type="text/javascript">
$(function () {
    table= $('#example1').DataTable()
    });

</script>
