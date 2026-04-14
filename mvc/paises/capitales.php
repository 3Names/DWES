<html>
<head>
<title>Paises y Capitales</title>
</head>
<body>
<h1>Paises y Capitales</h1>
<form method="POST">
Pais: <input type="text" name="pais"/><br>
Capital: <input type="text" name="capital"/><br>
<input type="submit" name="add" value="Añadir">
</form>
<?php 
if(isset($_POST["add"])){
	session_start();
	$pais = $_POST["pais"];
	$capital = $_POST["capital"];
	$lista = $_SESSION["lista"];
	if($capital == "") {
		unset($lista[$pais]);
	} else {
		$lista[$pais] = $capital;
	}
	if(isset($lista[$pais]) AND $capital != $lista[$pais]) {
		$lista[$pais] = $capital;
	}
	foreach($lista as $country => $capital2) {
		echo "$country tiene de capital: $capital2<br>";
	}

	$_SESSION["lista"] = $lista;
}	
?>
</body>
</html>
