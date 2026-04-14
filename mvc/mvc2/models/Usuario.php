<?php

class Usuario {
	public $id;
	public $usuario;
	public $password;
	public $rol;

	public function __construct($datos = []) {
		$this->id	= $datos['id'] ?? null;
		$this->usuario	= $datos['usuario'] ?? '';
		$this->password	= $datos['password'] ?? '';
		$this->rol	= $datos['rol'] ?? '';
	}	
}
