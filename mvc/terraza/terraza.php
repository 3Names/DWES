<!DOCTYPE html>
<html>
	<head>
		<title>Terraza</title>
	</head>
	<body>
		<h1>Ocupación:</h1>
		<ul>
		<?php
		$numMesas = $_GET["mesas"];
		$numSillas = $_GET["sillas"];
		$array_mesas = [];
		for ($indice = 0;$indice < $numMesas; $indice++){
			$array_mesas[$indice] = rand(0,$numSillas);
		}
		$numero_mesa = 1;
		foreach ($array_mesas as $ocupacion) {
			if ($ocupacion == 0) {
				echo "Mesa $numero_mesa esta vacia<br>";
				$numero_mesa++;
			} else if ($ocupacion == $numSillas) {
				echo "Mesa $numero_mesa esta ocupada<br>";
				$numero_mesa++;
			} else {
				echo "Mesa $numero_mesa tiene $ocupacion clientes<br>";
				$numero_mesa++;
			}
		}
		?>
		</ul>
	</body>
</html>
