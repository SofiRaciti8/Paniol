<?php

include_once 'db.php';

class User extends DB{

private $nombre;

public function userExists($user, $pass){
$md5pass = ($pass);

$query = $this-> connect()->prepare('SELECT * FROM Usuarios WHERE Nombre = :user AND Clave = :pass');

$query->execute(['user' => $user, 'pass' => $md5pass]);

if ($query->rowCount()){
	return true;

}else{
	return false;
}
}

public function setUser($user){
	$query=$this->connect()->prepare('SELECT * FROM Usuarios WHERE Nombre = :user');
	$query->execute(['user' => $user]);

foreach ($query as $currentUser) {
	$this->nombre= $currentUser['Nombre'];
	
}
}

public function getNombre(){
	return $this->nombre;
}

}

?>