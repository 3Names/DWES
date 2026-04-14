<html>
	<head>
		<title>Eliminar coche</title>
	</head>
	<body>

	<?php
	session_start();

	if (isset($_POST['eliminar'])){
		$arrayCoches = $_SESSION['arrayCoches'];
		$posicion = $_POST['indice'];

		unset($arrayCoches[$posicion]);
		$arrayCoches = array_values($arrayCoches);
		$_SESSION['arrayCoches'] = $arrayCoches;
		header("Location: https://www.dwes-ssl.com/coches/index.php");
	}
	?>

	</body>
</html>
