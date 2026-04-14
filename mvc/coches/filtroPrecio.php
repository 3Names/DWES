<html>
<head>
	<title>Filtro por precio</title>
</head>
<body>
	<h1>Coches disponibles</h1>
	
	<?php
	session_start();

	if (isset($_POST['filtro'])){
		$min = $_POST['min'];
		$max = $_POST['max'];
		$submax = $max;
		$arrayCoches = $_SESSION['arrayCoches'];
		echo "<ul>";
		for ($i=0; $i<count($arrayCoches); $i++) {
			if ($max == "") {
				$submax = $arrayCoches[$i]['precio'] + 1;
				if ($arrayCoches[$i]['precio'] > $min && $arrayCoches[$i]['precio'] < $submax) {
					echo "<li> Marca: ".$arrayCoches[$i]['marca'];
					echo "  Modelo: ".$arrayCoches[$i]['modelo'];
					echo "  Precio: ".$arrayCoches[$i]['precio'];
					echo "</li>";
				}
			} else {
				if ($arrayCoches[$i]['precio'] > $min && $arrayCoches[$i]['precio'] < $max) {
                                        echo "<li> Marca: ".$arrayCoches[$i]['marca'];
                                        echo "  Modelo: ".$arrayCoches[$i]['modelo'];
                                        echo "  Precio: ".$arrayCoches[$i]['precio'];
                                        echo "</li>";
                                }
			}
		}
		echo "</ul>";
	}
	?>
	<a href='index.php'>Volver al inicio</a>
</body>
</html>
