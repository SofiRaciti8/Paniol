<?php
include_once 'php/user.php';
include_once 'php/user_session.php';


$userSession= new userSession();

$user = new User();




if(isset($_SESSION['user'])){
	//echo "HAY";
	$user->setUser($userSession->getCurrentUser());
	require_once 'home.php';


}else if (isset($_POST['user']) && (isset($_POST['pass']))) {
	$userForm= $_POST['user'];
	$passForm= $_POST['pass'];


	if($user->userExists($userForm,$passForm)){
		//echo "usuario validado";
		$userSession->setCurrentUser($userForm);
		$user->setUser($userForm);
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$fechaHChoy=date('Y-m-d H:i:s');

		require_once 'home.php';

		require_once "php/conexionP.php";
		$conexionP=conexionP();
		mysqli_query($conexionP, "INSERT INTO registro(idRegistro,Usuario,FechaYHoraLogeo,FechaYHoraDeslogeo) VALUES ('','$userForm', '$fechaHChoy','')");


	}else{
	//echo "nombre de usuario y/o contraseña incorrectos";
	$errorLogin="Datos incorrectos, intente nuevamente";
	require_once 'login.php';
}
	//echo "validacion de login";
}else{
	//echo "Login";
	require_once'login.php';
}

?>

