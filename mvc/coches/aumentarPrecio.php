<html>
<head>
</head>
<body>	
	<?php 
	session_start();

	if (isset($_POST['aumentar'])){
		$numero = $_POST['numero'];
		$arrayCoches = $_SESSION['arrayCoches'];
		for ($i=0; $i<count($arrayCoches); $i++){
			$arrayCoches[$i]['precio'] = $arrayCoches[$i]['precio'] + $numero;
		}
		$_SESSION['arrayCoches'] = $arrayCoches;
		header("Location: https://www.dwes-ssl.com/coches/index.php");
	}
	?>
	
</body>
</html>
