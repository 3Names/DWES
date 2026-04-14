<html>
<head>
<title>Coches disponibles</title>
</head>
<body>
<h2>Coches disponibles</h2>
	<?php
	include 'db.php';

	if (isset($_POST['filtro'])) {
		$color = $_POST['color'];
		$stmt = $conn->prepare("SELECT * FROM coches WHERE color = ?;");
		$stmt->bind_param('s',$color);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result->num_rows >= 1) {
			while($row = $result->fetch_assoc()) {
				echo "Marca: ".$row['marca']." Modelo: ".$row['modelo']." Color: ".$row['color']."<br/>";
			}
		}
		$stmt->close();
		$conn->close();
	}
	?>
	<a href="index.php">Volver al inicio</a>

</body>
</html>
