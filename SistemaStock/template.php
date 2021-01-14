

<?php


include_once 'php/user.php';
include_once 'php/user_session.php';

$userSession= new userSession();

$user = new User();


if(isset($_SESSION['user'])){
  //echo "HAY";
  $user->setUser($userSession->getCurrentUser());
  require_once'template.php';

}else if (isset($_POST['user']) && (isset($_POST['pass']))) {
  $userForm= $_POST['user'];
  $passForm= $_POST['pass'];

  if($user->userExists($userForm,$passForm)){
    //echo "usuario validado";
    $userSession->setCurrentUser($userForm);
    $user->setUser($userForm);
    require_once 'template.php';

  }else{
  //echo "nombre de usuario y/o contraseña incorrectos";
  $errorLogin="Datos incorrectos, intente nuevamente";
  require_once 'login.php';
}
  //echo "validacion de login";
}else if (is_null($_POST['user']) && (is_null($_POST['pass']))){
  //echo "Login";
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>App Stock</title>


  
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

  
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="dist/css/AdminLTEm.css">
  
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="Estilos/alert.css">

 
  <!-- Alertify CSS -->
    
  
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                
                <div class="text-center">
                  <a href="php/logout.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>


    <!-- sidebar: style can be found in sidebar.less -->
  
      <!-- Sidebar user panel -->
     
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

      <!-- search form (Optional) -->
      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
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
          
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>