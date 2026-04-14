<html>
<head>
<title>forms</title>
</head>
<body>
<?php 
$name=$_POST["nombre"];
$surname=$_POST["apellido"];

if ($name == "" || !$name || $surname == "" || !$surname){
	header('Location: form1.php');
}
?>
<form action="form3.php" method="POST">
email: <input type="text" name="correo"><br>
contraseña: <input type="text" name="contraseña"><br>
<input type="submit" value="send">
<input type="hidden" name="nombre" value="<?=$name ?>">
<input type="hidden" name="apellido" value="<?=$surname?>">
</form>
</body>
</html>
