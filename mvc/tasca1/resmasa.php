<html>
<head>
<title>GET</title>
</head>
<body>
Enviados
<ul>
<?php
$masa = $_POST["peso"] / ($_POST["altura"] ** 2) ;
echo "Indice de masa corporal: ".$masa;
?>
</ul>
</body>
</html>
