<html>
	<head>
	    <title>Venta Coches</title>
	</head>
	<body>
		<h1>Coches disponibles</h1>		

		<?php
		session_start();
		
		if (isset($_SESSION['arrayCoches'])){
			$arrayCoches = $_SESSION['arrayCoches'];
			echo "<ul>";
			for ($i=0; $i<count($arrayCoches); $i++){
				echo "<li>Marca: ".$arrayCoches[$i]['marca'];
				echo " Modelo: ".$arrayCoches[$i]['modelo'];
				echo " Precio: ".$arrayCoches[$i]['precio'];
				
				echo "<form action='detalleCoche.php' method='POST' style='display:inline;margin-left:10px;'>";
				echo "<input type='hidden' name='indice' value='$i'/>";
				echo "<input type='submit' name='detalle' value='Detalles coche'/>";				
				echo "</form>";
				
				echo "<form action='editarCoche.php' method='POST' style='display:inline;margin-left:10px;'>";
				echo "<input type='hidden' name='indice' value='$i'/>";
				echo "<input type='submit' name='editar' value='Editar coche'/>";				
				echo "</form>";
				
				echo "<form action='eliminarCoche.php' method='POST' style='display:inline;margin-left:10px;'>";
				echo "<input type='hidden' name='indice' value='$i'/>";
				echo "<input type='submit' name='eliminar' value='Eliminar coche'/>";				
				echo "</form><br/><br/>";
				
				echo "</li>";													
			}
			echo "</ul>";
		}
		else{
			echo "No hay coches en venta<br/>";
			$arrayCoches = [];
			$_SESSION['arrayCoches'] = $arrayCoches;
		}
		?>

		<form action="añadirCoche.php" method="POST">
			<input type="submit" name="addcar" value="Añadir coche"/>
		</form>
		<h3>Filtrar por color</h3>
		<form action="filtroColor.php" method="POST">
			<input type="text" name="color">
			<input type="submit" name="filtro" value="Filtrar">
		</form>

		<h3>Filtrar por marca</h3>
		<form action="filtroMarca.php" method="POST">
			<input type="text" name="marca">
			<input type="submit" name="filtro" value="Filtrar">
		</form>
		
		<h3>Filtrar por precio</h3>
		<form action="filtroPrecio.php" method="POST">
			<label>Min: </label><input type="text" name="min"><br/>
			<label>Max: </label><input type="text" name="max"><br/>
			<input type="submit" name="filtro" value="Filtrar">
		</form>

		<h3>Aumentar precio</h3>
		<form action="aumentarPrecio.php" method="POST">
			<label>Aumentar precio en: <input type="text" name="numero">
			<input type="submit" name="aumentar" value="Enviar">
		</form>
	</body>
</html>
