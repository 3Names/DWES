<html>

	<head>
		<title>Eliminar coche</title>
	</head>
	<body>

	<?php
	session_start();

	include 'db.php';

	if (isset($_POST['eliminar'])){
		$id = $_POST["posicion"];
		$stmt = $conn->prepare("DELETE from coches WHERE id = ?;");
		$stmt->bind_param('d',$id);
		$stmt->execute();

		$stmt->close();
		$conn->close();

		header("Location: https://www.dwes-ssl.com/cochesbd/index.php");
	}
	?>

	</body>
</html>
