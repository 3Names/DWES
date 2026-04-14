<?php

require_once "models/TareasModel.php";

class TareasController {

    public function index() {
    	// Revisar y modificar
	$model = new TareasModel();
	$tareas = $model->getAll();

    	require "views/tareas_listado.php";
    }

    public function crear() {
	// Revisar y modificar
	if(!empty($_POST['añadir'])){
		$datos = [
			'texto' => $_POST['texto'],
			'estado' => $_POST['estado'],
			'autor' => $_POST['autor'] ?: null,
			'tema' => $_POST['tema'],
			'fecha_limite' => $_POST['fecha_limite']
		];
		$tarea= new Tarea($datos);

		$model = new TareasModel();
		$model->save($tarea);
		header("Location: index.php?controller=Tareas&action=index");
		exit;	
	}
    	require "views/tareas_crear.php";
    }

    public function ver() {
    	// Revisar y modificar
    	if (isset($_GET['id'])) {
        	$id = $_GET['id'];
        
        	$model = new TareasModel();
		$tarea = $model->getById($id);
		require "views/tareas_ver.php";
   	} else {
        	header("Location: index.php?controller=Tareas&action=index");
        	exit;
    	}
    }

    public function editar(){
	if (isset($_GET['id'])) {
		$id = $_GET['id'];	
		$model = new TareasModel();
		$tarea = $model->getById($id);
		require "views/tareas_editar.php";	
	} else {
		header("Location: index.php?controller=Tareas&action=index");
		exit;
	}
    }

    public function editar_form(){
    	if(!empty($_POST['editar'])){
		$datos = [
			'id' => $_POST['id'],
                        'texto' => $_POST['texto'],
                        'estado' => $_POST['estado'],
                        'autor' => $_POST['autor'] ?: null,
                        'tema' => $_POST['tema'],
                        'fecha_limite' => $_POST['fecha_limite']
		];
		$model = new TareasModel();
		$model->update($datos);

		header("Location: index.php?controller=Tareas&action=index");
	}
    }	
    
    public function eliminar() {
	// Revisar y modificar
	if ($_SESSION['rol'] == "user") {
    		$_SESSION['error'] = "No tienes permisos para eliminar tareas";
    		header("Location: index.php");
    		exit;
	}

	if (isset($_GET['id'])) {
        	$id = $_GET['id'];
        
        	$model = new TareasModel();
        	$model->delete($id);
        	
		$_SESSION['mensaje'] = "Tarea eliminada";
        	header("Location: index.php?controller=Tareas&action=index");
        	exit;
    	} else {
        	header("Location: index.php?controller=Tareas&action=index");
        	exit;
    	}
    }
}
