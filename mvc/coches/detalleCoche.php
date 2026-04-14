<html>
	<head>
	    <title>Detalle Coches</title>
	</head>
	<body>
		<h2>Detalle coches</h2>
	    
	    	<?php
		session_start();

		if (isset($_POST['detalle'])) {
			$posicion = $_POST['indice'];
			$arrayCoches = $_SESSION['arrayCoches'];
			echo "<ul>";
			echo "<li> Matrícula: " . $arrayCoches[$posicion]['matricula'] . "</li>";
			echo "<li> Marca: " . $arrayCoches[$posicion]['marca'] . "</li>";
			echo "<li> Modelo: " . $arrayCoches[$posicion]['modelo'] . "</li>";
			echo "<li> Color: " . $arrayCoches[$posicion]['color'] . "</li>";
			echo "<li> Año: " . $arrayCoches[$posicion]['anyo'] . "</li>";
			echo "<li> Kms: " . $arrayCoches[$posicion]['kms'] . "</li>";
			echo "<li> Precio: " . $arrayCoches[$posicion]['precio'] . "</li>";
			echo "<li> Tipo: ". $arrayCoches[$posicion]['tipo']. "</li>";
			echo "<li> Caballos: ". $arrayCoches[$posicion]['caballos']. "</li>";
			echo "</ul>";
			echo "<img width='300' height='300' src='img/".$arrayCoches[$posicion]['img']."'/>";
		}

		echo "<a href='index.php'> Vuelve al inicio </a>";
		?>
	</body>
</html>
