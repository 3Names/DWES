<?php
require_once "models/UsuariosModel.php";
require_once "models/PublicacionesModel.php";
require_once "models/Validacion.php";
require_once "models/ACL.php";

class UsuariosController {

	public function crear() {
    	if (!ACL::puede('usuarios.crear')) {
        	$_SESSION['error'] = "No tienes permisos para crear usuarios";
        	header("Location: index.php");
        	exit;
    	}

    	if (!empty($_POST['email'])) {

        	$datos = [
            	'email'    => $_POST['email'],
            	'nickname' => $_POST['nickname'],
            	'password' => $_POST['password'],
            	'rol'      => $_POST['rol']
        	];

        	$errores = Validacion::validarUsuario($datos);

        	if (!empty($errores)) {
            	$_SESSION['error'] = implode(', ', $errores);
            	header("Location: index.php?controller=Usuarios&action=crear");
            	exit;
        	}

        	$datos['password'] = password_hash($datos['password'], PASSWORD_DEFAULT);
        	$usuario = new Usuario($datos);
        	$modelo = new UsuariosModel();
        	$modelo->save($usuario);

        	$_SESSION['mensaje'] = "Usuario creado correctamente";
        	header("Location: index.php");
        	exit;
    	}

    	require "views/usuarios_crear.php";
	}

	public function perfil() {
    	if (!isset($_GET['id'])) {
        	$id = $_SESSION['id'];
    	} else {
        	$id = $_GET['id'];
    	}

    	$modeloUsuario = new UsuariosModel();
    	$usuario = $modeloUsuario->getById($id);

    	$modeloPublicaciones = new PublicacionesModel();
    	$publicaciones = $modeloPublicaciones->getByUsuario($id);

    	require "views/usuarios_perfil.php";
	}

	public function editar_form() {
    	if (!ACL::puede('usuarios.editar')) {
        	$_SESSION['error'] = "No tienes permisos para editar el perfil";
        	header("Location: index.php");
        	exit;
    	}

    	$modelo = new UsuariosModel();
    	$usuario = $modelo->getById($_SESSION['id']);

    	require "views/usuarios_editar.php";
	}

	public function editar() {
    	if (!isset($_POST['guardar'])) {
        	header("Location: index.php");
        	exit;
    	}

    	$datos = [
        	'id'       => $_SESSION['id'],
        	'email'    => $_POST['email'],
        	'nickname' => $_POST['nickname'],
        	'foto'     => $_POST['foto'] ?? 'user.png'
    	];

    	$usuario = new Usuario($datos);
    	$modelo = new UsuariosModel();
    	$modelo->update($usuario);

    	$_SESSION['email'] = $datos['email'];
    	$_SESSION['nickname'] = $datos['nickname'];
    	$_SESSION['foto'] = $datos['foto'];

    	$_SESSION['mensaje'] = "Perfil actualizado correctamente";
    	header("Location: index.php?controller=Usuarios&action=perfil");
    	exit;
	}

	public function cambiarPassword_form() {
    	require "views/usuarios_cambiar_password.php";
	}

	public function cambiarPassword() {
    	if (!isset($_POST['guardar'])) {
        	header("Location: index.php");
        	exit;
    	}

    	$passwordActual = $_POST['password_actual'];
    	$passwordNueva = $_POST['password_nueva'];
    	$passwordConfirmar = $_POST['password_confirmar'];

    	if ($passwordNueva !== $passwordConfirmar) {
        	$_SESSION['error'] = "Las contraseñas no coinciden";
        	header("Location: index.php?controller=Usuarios&action=cambiarPassword_form");
        	exit;
    	}

    	$modelAuth = new AuthModel();
    	$user = $modelAuth->login($_SESSION['email'], $passwordActual);

    	if (!$user) {
        	$_SESSION['error'] = "La contraseña actual es incorrecta";
        	header("Location: index.php?controller=Usuarios&action=cambiarPassword_form");
        	exit;
    	}

    	$modelo = new UsuariosModel();
    	$modelo->cambiarPassword($_SESSION['id'], $passwordNueva);

    	$_SESSION['mensaje'] = "Contraseña cambiada correctamente";
    	header("Location: index.php?controller=Usuarios&action=perfil");
    	exit;
	}
}
?>
