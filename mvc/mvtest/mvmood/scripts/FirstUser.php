<?php
require '../models/db.php';

$passwordAdmin = password_hash("admin123", PASSWORD_DEFAULT);
$passwordUser  = password_hash("user123", PASSWORD_DEFAULT);

$db = conectar();

$stmt = $db->prepare("
	INSERT INTO usuarios (email, nickname, foto, password, rol)
	VALUES (:email, :nickname, :foto, :password, :rol)
");

$stmt->execute([
	':email'    => 'admin@mvmmood.com',
	':nickname' => 'Admin',
	':foto'     => 'user.png',
	':password' => $passwordAdmin,
	':rol'      => 'admin'
]);

$stmt->execute([
	':email'    => 'user@mvmmood.com',
	':nickname' => 'Usuario',
	':foto'     => 'user.png',
	':password' => $passwordUser,
	':rol'      => 'user'
]);

echo "Usuarios creados correctamente:<br>";
echo "Admin: admin@mvmmood.com / admin123<br>";
echo "User: user@mvmmood.com / user123<br>";
?>
