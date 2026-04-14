<?php
require_once "db.php";
require_once "Tarea.php";

class TareasModel {

	public function getAll() {
    		$db = conectar();
    		$stmt = $db->query("SELECT * FROM tareas ORDER BY id DESC");
    		$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    		$tareas = [];
    		foreach ($resultado as $fila) {
        		// cada fila de BD → objeto Tarea
        		$tareas[] = new Tarea($fila);
    		}
    		return $tareas;
    	}

	public function getById($id) {
    		$db = conectar();
    		$stmt = $db->prepare("SELECT * FROM tareas WHERE id = :id");
    		$stmt->execute([':id' => $id]);
    		$fila = $stmt->fetch(PDO::FETCH_ASSOC);
    		$tarea = new Tarea($fila);
    		return $tarea;
	}

	public function save(Tarea $tarea) {
    		$db = conectar();
    		$stmt = $db->prepare("
        		INSERT INTO tareas (texto, estado, autor, tema, fecha_limite)
        		VALUES (:texto, :estado, :autor, :tema, :fecha_limite)
    		");
    		$stmt->execute([
        		':texto'    	=> $tarea->texto,
        		':estado'   	=> $tarea->estado,
        		':autor'    	=> $tarea->autor,
        		':tema'     	=> $tarea->tema,
        		':fecha_limite' => $tarea->fecha_limite
    		]);
	}

	public function update($datos = []) {
		$db = conectar();
		$stmt = $db->prepare("
			UPDATE tareas SET texto = :texto, estado = :estado, autor = :autor, tema = :tema, fecha_limite = :fecha_limite WHERE id = :id
			");
		$stmt->execute([
			':texto'	=> $datos['texto'],
			':estado'        => $datos['estado'],
			':autor'        => $datos['autor'],
			':tema'        => $datos['tema'],
			':fecha_limite'        => $datos['fecha_limite'],
			':id'        => $datos['id']
		]);
	}

	public function delete($id) {
		// Revisar y modificar si es necesario
		$db = conectar();
    		$stmt = $db->prepare("DELETE FROM tareas WHERE id = :id");
    		$stmt->execute([':id' => $id]);
	}
}
