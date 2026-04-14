<?php
class ACL {

	private static $permisos = [
    	'admin' => [
        	'tareas.index',
        	'tareas.ver',
        	'tareas.crear',
        	'tareas.editar',
		'tareas.eliminar',
		'usuarios.crear'
    	],
    	'user' => [
        	'tareas.index',
        	'tareas.ver',
        	'tareas.crear',
        	'tareas.editar'
	],
	'observer' => [
		'tareas.index',
		'tareas.ver'
	]
	];

	public static function puede($accion) {

    	if (!isset($_SESSION['rol'])) {
        	return false;
    	}

    	$rol = $_SESSION['rol'];

    	return in_array($accion, self::$permisos[$rol]);
	}
}

