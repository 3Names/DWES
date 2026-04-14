<html>
<head>
<title>Resultados</title>
</head>
<body>
<?php 
$name=$_POST["nombre"];
$surname=$_POST["apellido"];
$email=$_POST["correo"];
$pass=$_POST["contraseña"];
$enterprice=$_POST["empresa"];
$position=$_POST["cargo"];
?>
<ul>
<li>Nombre: <?=$name?></li>
<li>Apellido: <?=$surname?></li>
<li>Correo: <?=$email?></li>
<li>Contraseña: <?=$pass?></li>
<li>Empresa: <?=$enterprice?></li>
<li>Cargo: <?=$position?></li>
</ul>
</body>
</html>
