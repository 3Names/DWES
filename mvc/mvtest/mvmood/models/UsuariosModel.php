<?php
require_once "db.php";
require_once "Usuario.php";

class UsuariosModel {

	public function getAll() {
    	$db = conectar();
    	$stmt = $db->query("SELECT * FROM usuarios ORDER BY id DESC");
    	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	$usuarios = [];
    	foreach ($resultado as $fila) {
        	$usuarios[] = new Usuario($fila);
    	}
    	return $usuarios;
	}

	public function getById($id) {
    	$db = conectar();
    	$stmt = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
    	$stmt->execute([':id' => $id]);
    	$fila = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($fila) {
        	return new Usuario($fila);
    	}
    	return null;
	}

	public function save(Usuario $usuario) {
    	$db = conectar();
    	$stmt = $db->prepare("
        	INSERT INTO usuarios (email, nickname, foto, password, rol)
        	VALUES (:email, :nickname, :foto, :password, :rol)
    	");
    	$stmt->execute([
        	':email'    => $usuario->email,
        	':nickname' => $usuario->nickname,
        	':foto'     => $usuario->foto,
        	':password' => $usuario->password,
        	':rol'      => $usuario->rol
    	]);
	}

	public function update(Usuario $usuario) {
    	$db = conectar();
    	$stmt = $db->prepare("
        	UPDATE usuarios
        	SET
            	email    = :email,
            	nickname = :nickname,
            	foto     = :foto
        	WHERE id = :id
    	");
    	$stmt->execute([
        	':email'    => $usuario->email,
        	':nickname' => $usuario->nickname,
        	':foto'     => $usuario->foto,
        	':id'       => $usuario->id
    	]);
	}

	public function cambiarPassword($id, $nuevaPassword) {
    	$db = conectar();
    	$stmt = $db->prepare("
        	UPDATE usuarios
        	SET password = :password
        	WHERE id = :id
    	");
    	$passwordHash = password_hash($nuevaPassword, PASSWORD_DEFAULT);
    	$stmt->execute([
        	':password' => $passwordHash,
        	':id'       => $id
    	]);
	}

	public function delete($id) {
    	$db = conectar();
    	$stmt = $db->prepare("DELETE FROM usuarios WHERE id = :id");
    	$stmt->execute([':id' => $id]);
	}
}
?>
