<?php

class Validacion {

	public static function validarTarea($datos) {

    	$errores = [];

    	if (trim($datos['texto']) === '') {
        	$errores[] = "La descripcion es obligatoria";
    	}

    	if ($datos['tema'] == '') {
        	$errores[] = "El tema es obligatorio";
    	}

    	if (!in_array($_POST['estado'], ['pendiente','iniciada','finalizada'])) {
        	$errores[] = "Estado no válido";
    	}

    	if (!$datos['fecha_limite'] == '') {
           // convertimos fecha_limite a objeto DateTime
		$fecha = DateTime::createFromFormat('Y-m-d', $datos['fecha_limite']);
           // si se crea, es que el formato es correcto
        	if (!$fecha) {
            	$errores[] = "Fecha límite incorrecta";
        	}
    	}

    	return $errores;
	}

}
