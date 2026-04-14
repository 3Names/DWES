<html>
<head>
<title>Contador palabras</title>
</head>
<body>
<h1>Introduce una palabra:</h1>
<form method="POST">
	<input type="text" name="texto"><br>
	<input type="submit" value="send">
</form>
<?php
	session_start();
	$texto = $_POST["texto"];
	$repetidas = $_SESSION["repetidas"];
	
	for ($indice = 0; $indice < strlen($texto);$indice++) {
		$letra = $texto[$indice];
		if (isset($repetidas[$letra])){
			$repetidas[$letra]=$repetidas[$letra]+1;
		} else {
			$repetidas[$letra]=1;
		}
	}

	echo "<br/><br/><ul>";
	foreach ($repetidas as $letra => $numero) {
		echo "<li>".$letra." aparece ".$numero." veces "."</li>";
	}
	echo "</ul>";
	$_SESSION["repetidas"] = $repetidas;

?>
</body>
</html>
