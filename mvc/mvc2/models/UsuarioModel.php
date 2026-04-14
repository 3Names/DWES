<?php
require_once "db.php";
require_once "Usuario.php";

class UsuarioModel {
	
	public function save(Usuario $usuario) {
                $db = conectar();
                $stmt = $db->prepare("
                        INSERT INTO usuarios (usuario, password, rol)
                        VALUES (:usuario, :password, :rol)
		");
		$contrasena = $usuario->password;
		$encriptado = password_hash($contrasena, PASSWORD_DEFAULT);
                $stmt->execute([
                        ':usuario'        => $usuario->usuario,
                        ':password'       => $encriptado,
              	        ':rol'        => $usuario->rol
                ]);
	}
}
