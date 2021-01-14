<?php 
		function conexionP(){
			$servidor="localhost";
			$usuario="root";
			$password="";
			$bd="stockk";


			$conexionP=mysqli_connect('localhost','root','','stockk');

			return $conexionP;
		}

	

 ?>