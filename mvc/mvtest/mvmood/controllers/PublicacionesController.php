<?php
require_once "models/PublicacionesModel.php";
require_once "models/Validacion.php";
require_once "models/ACL.php";

class PublicacionesController {

	public function index() {
    	$modelo = new PublicacionesModel();
    	$publicaciones = $modelo->getAll();
    	require "views/publicaciones_listado.php";
	}

	public function crear() {
    	if (!ACL::puede('publicaciones.crear')) {
        	$_SESSION['error'] = "No tienes permisos para crear publicaciones";
        	header("Location: index.php");
        	exit;
    	}

    	if (isset($_POST['contenido'])) {

        	$datos = [
            	'idUsuario' => $_SESSION['id'],
            	'contenido' => $_POST['contenido'],
            	'foto'      => null
        	];

        	$errores = Validacion::validarPublicacion($datos);

        	if (!empty($errores)) {
            	$_SESSION['error'] = implode(', ', $errores);
            	header("Location: index.php?controller=Publicaciones&action=crear");
            	exit;
        	}

        	$publicacion = new Publicacion($datos);
        	$modelo = new PublicacionesModel();
        	$modelo->save($publicacion);

        	$_SESSION['mensaje'] = "Publicación creada correctamente";
        	header("Location: index.php");
        	exit;
    	}

    	require "views/publicaciones_crear.php";
	}

	public function ver() {
    	if (!isset($_GET['id'])) {
        	header("Location: index.php");
        	exit;
    	}

    	$modelo = new PublicacionesModel();
    	$publicacion = $modelo->getById($_GET['id']);

    	require "views/publicaciones_ver.php";
	}

	public function editar_form() {
    	if (!isset($_GET['id'])) {
        	header("Location: index.php");
        	exit;
    	}

    	if (!ACL::puede('publicaciones.editar')) {
        	$_SESSION['error'] = "No tienes permisos para editar publicaciones";
        	header("Location: index.php");
        	exit;
    	}

    	$modelo = new PublicacionesModel();
    	$publicacion = $modelo->getById($_GET['id']);

    	if ($publicacion['idUsuario'] != $_SESSION['id'] && $_SESSION['rol'] != 'admin') {
        	$_SESSION['error'] = "No puedes editar publicaciones de otros usuarios";
        	header("Location: index.php");
        	exit;
    	}

    	require "views/publicaciones_editar.php";
	}

	public function editar() {
    	if (!isset($_POST['guardar'])) {
        	header("Location: index.php");
        	exit;
    	}

    	$datos = [
        	'id'        => $_POST['id'],
        	'idUsuario' => $_SESSION['id'],
        	'contenido' => $_POST['contenido'],
        	'foto'      => null
    	];

    	$errores = Validacion::validarPublicacion($datos);

    	if (!empty($errores)) {
        	$_SESSION['error'] = implode(', ', $errores);
        	$id = $datos['id'];
        	header("Location: index.php?controller=Publicaciones&action=editar_form&id=$id");
        	exit;
    	}

    	$publicacion = new Publicacion($datos);
    	$modelo = new PublicacionesModel();
    	$modelo->update($publicacion);

    	$_SESSION['mensaje'] = "Publicación actualizada";
    	header("Location: index.php");
    	exit;
	}

	public function eliminar() {
    	if (!ACL::puede('publicaciones.eliminar')) {
        	$_SESSION['error'] = "No tienes permisos para eliminar publicaciones";
        	header("Location: index.php");
        	exit;
    	}

    	if (!isset($_GET['id'])) {
        	header("Location: index.php");
        	exit;
    	}

    	$modelo = new PublicacionesModel();
    	$publicacion = $modelo->getById($_GET['id']);

    	if ($publicacion['idUsuario'] != $_SESSION['id'] && $_SESSION['rol'] != 'admin') {
        	$_SESSION['error'] = "No puedes eliminar publicaciones de otros usuarios";
        	header("Location: index.php");
        	exit;
    	}

    	$modelo->delete($_GET['id']);

    	$_SESSION['mensaje'] = "Publicación eliminada";
    	header("Location: index.php");
    	exit;
	}
}
?>
