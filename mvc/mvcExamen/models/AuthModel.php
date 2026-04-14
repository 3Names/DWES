<?php
require_once "db.php";

class AuthModel {

	public function login($usuario, $password) {

    	$db = conectar();


    	$stmt = $db->prepare(
        	"SELECT * FROM usuarios WHERE usuario = :usuario"
    	);
    	$stmt->execute([':usuario' => $usuario]);
    	$user = $stmt->fetch(PDO::FETCH_ASSOC);

    	if (isset($user) && password_verify($password,$user['password'])) {
        	return $user;
    	}

    	return false;
	}
}
?>
