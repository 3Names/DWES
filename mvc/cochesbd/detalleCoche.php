<html>
	<head>
	    <title>Detalle Coches</title>
	</head>
	<body>
		<h2>Detalle coches</h2>
	    
	    	<?php
		session_start();
		
		include 'db.php';

		if (isset($_POST['detalle'])) {
			$id = $_POST["posicion"];

			$stmt = $conn->prepare("SELECT * FROM coches WHERE id = ?;");
			$stmt->bind_param('d',$id);
			$stmt->execute();
			$result = $stmt->get_result();
			#Añado el campo de vendido para mostrarlo
			if ($result->num_rows == 1){
				$row = $result->fetch_assoc();
				echo "<ul>";
				echo "<li> Marca: ".$row['marca']."</li>";
				echo "<li> Modelo: ".$row['modelo']."</li>";
				echo "<li> Color: ".$row['color']."</li>";
				echo "<li> Año: ".$row['año']."</li>";
				echo "<li> Kms: ".$row['klms']."</li>";
				echo "<li> Precio: ".$row['precio']."</li>";
				echo "<li> Matricula: ".$row['matricula']."</li>";
				echo "<li> Vendido: ".$row['vendido']."</li>";
				echo "</ul>";
			} else {
				echo "Hay un error";
			}
			$conn->close();
		}
		?>
		<a href="index.php">Volver al listado de coches</a>
	</body>
</html>
