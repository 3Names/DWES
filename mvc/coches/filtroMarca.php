<html>
<head>
	<title>Filtro por marca</title>
</head>
<body>
	<h1>Coches disponibles</h1>
	<?php
	session_start();
	
	if (isset($_POST['filtro'])){
		$filtro = $_POST['marca'];
		$arrayCoches = $_SESSION['arrayCoches'];
		echo "<ul>";
		for ($i=0; $i<count($arrayCoches); $i++){
			if ($arrayCoches[$i]['marca'] == $filtro){
				echo "<li>Marca: ".$arrayCoches[$i]['marca'];
				echo "	Modelo: ".$arrayCoches[$i]['modelo'];
				echo "  Precio: ".$arrayCoches[$i]['precio'];
				echo "</li>";
			}
		}
		echo "</ul>";
	}
	?>
	<a href='index.php'>Volver al inicio</a>
</body>
</html>
