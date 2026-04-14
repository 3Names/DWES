<html>
<head>
<title>forms</title>
</head>
<body>
<?php 
$name=$_POST["nombre"];
$surname=$_POST["apellido"];
$email=$_POST["correo"];
$contra=$_POST["contraseña"];
if ($name == "" || !$name || $surname == "" || !$surname || $email == "" || !$email || $contra == "" || !$contra){
        header('Location: form1.php');
}
?>
<form action="resultados.php" method="POST">
empresa: <input type="text" name="empresa"><br>
cargo: <input type="text" name="cargo"><br>
<input type="submit" value="send">
<input type="hidden" name="nombre" value="<?=$name ?>">
<input type="hidden" name="apellido" value="<?=$surname?>">
<input type="hidden" name="correo" value="<?=$email?>">
<input type="hidden" name="contraseña" value="<?=$contra?>">
</form>
</body>
</html>
