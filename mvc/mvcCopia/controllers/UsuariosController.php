<?php

require_once "models/UsuarioModel.php";
require_once "models/ACL.php";

class UsuariosController {
	public function crear() {
        	if (!ACL::puede('usuarios.crear')) {
                	$_SESSION['error'] = "No tienes permisos para crear usuarios";
                	header("Location: index.php");
                	exit;
        	}

        	if(!empty($_POST['nuevo_usuario'])){
                	$datos = [
                        	'usuario' => $_POST['usuario'],
                        	'password' => $_POST['password'],
                        	'rol' => $_POST['rol']
                	];
                	$usuario= new Usuario($datos);

                	$model = new UsuarioModel();
                	$model->save($usuario);
                	header("Location: index.php?controller=Tareas&action=index");
                	exit;
       		}
        	require "views/usuarios_crear.php";
    	}	
}
