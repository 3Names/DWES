<?php
require_once "db.php";
require_once "Publicacion.php";

class PublicacionesModel {

	public function getAll() {
    	$db = conectar();
    	$stmt = $db->query("
        	SELECT p.*, u.nickname, u.foto as usuario_foto
        	FROM publicaciones p
        	INNER JOIN usuarios u ON p.idUsuario = u.id
        	ORDER BY p.fecha DESC
    	");
    	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	$publicaciones = [];
    	foreach ($resultado as $fila) {
        	$publicaciones[] = $fila;
    	}
    	return $publicaciones;
	}

	public function getById($id) {
    	$db = conectar();
    	$stmt = $db->prepare("
        	SELECT p.*, u.nickname, u.foto as usuario_foto
        	FROM publicaciones p
        	INNER JOIN usuarios u ON p.idUsuario = u.id
        	WHERE p.id = :id
    	");
    	$stmt->execute([':id' => $id]);
    	$fila = $stmt->fetch(PDO::FETCH_ASSOC);
    	return $fila;
	}

	public function getByUsuario($idUsuario) {
    	$db = conectar();
    	$stmt = $db->prepare("
        	SELECT p.*, u.nickname, u.foto as usuario_foto
        	FROM publicaciones p
        	INNER JOIN usuarios u ON p.idUsuario = u.id
        	WHERE p.idUsuario = :idUsuario
        	ORDER BY p.fecha DESC
    	");
    	$stmt->execute([':idUsuario' => $idUsuario]);
    	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	return $resultado;
	}

	public function save(Publicacion $publicacion) {
    	$db = conectar();
    	$stmt = $db->prepare("
        	INSERT INTO publicaciones (idUsuario, contenido, foto, fecha)
        	VALUES (:idUsuario, :contenido, :foto, :fecha)
    	");
    	$stmt->execute([
        	':idUsuario' => $publicacion->idUsuario,
        	':contenido' => $publicacion->contenido,
        	':foto'      => $publicacion->foto,
        	':fecha'     => $publicacion->fecha
    	]);
	}

	public function update(Publicacion $publicacion) {
    	$db = conectar();
    	$stmt = $db->prepare("
        	UPDATE publicaciones
        	SET
            	contenido = :contenido,
            	foto      = :foto
        	WHERE id = :id
    	");
    	$stmt->execute([
        	':contenido' => $publicacion->contenido,
        	':foto'      => $publicacion->foto,
        	':id'        => $publicacion->id
    	]);
	}

	public function delete($id) {
    	$db = conectar();
    	$stmt = $db->prepare("DELETE FROM publicaciones WHERE id = :id");
    	$stmt->execute([':id' => $id]);
	}
}
?>
