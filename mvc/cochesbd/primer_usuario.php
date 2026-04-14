<?php
$result = $conn->query("SELECT * FROM Usuarios");
$nombre = "patricio";
$apellido = "salazar";
$contrasena = password_hash("1234",PASSWORD_DEFAULT);
$rol = 1;
if ($result->num_rows == 0) {
	$stmt = $conn->prepare("INSERT INTO Usuarios (nombre,apellido,contraseña,rol) VALUES (?,?,?,?)");
	$stmt->bind_param('sssi',$nombre,$apellido,$contrasena,$rol);
	$stmt->execute();
} else {

}
#Añadida la variable de apellido, el campo dentro del statement y enlazado con la variable creada, EX1.
?>
