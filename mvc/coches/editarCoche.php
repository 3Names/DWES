<html>
	<head>
	    <title>Editar coche</title>
	</head>
	<body>
		<h2>Editar coche</h2>
	    	<?php
	    	session_start();
	    	
	    	if (isset($_POST['editar'])){
	    		$posicion = $_POST['indice'];
	    	?>
		    	<form action="editarCoche.php" method="POST">
		    		<label>Marca </label><input type="text" name="marca" value="<?=$_SESSION['arrayCoches'][$posicion]['marca']?>"/><br/><br/>
		    		<label>Modelo </label><input type="text" name="modelo" value="<?=$_SESSION['arrayCoches'][$posicion]['modelo']?>"/><br/><br/>
		    		<label>Matrícula </label><input type="text" name="matricula" value="<?=$_SESSION['arrayCoches'][$posicion]['matricula']?>"/><br/><br/>
		    		<label>Color </label><input type="text" name="color" value="<?=$_SESSION['arrayCoches'][$posicion]['color']?>"/><br/><br/>
		    		<label>Año de fabricación </label><input type="text" name="anyo" value="<?=$_SESSION['arrayCoches'][$posicion]['anyo']?>"/><br><br/>
		    		<label>KMs </label><input type="text" name="kms" value="<?=$_SESSION['arrayCoches'][$posicion]['kms']?>"/><br/><br/>
				<label>Precio </label><input type="text" name="precio" value="<?=$_SESSION['arrayCoches'][$posicion]['precio']?>"/><br/><br/>
				<label>Tipo </label><input type="text" name="tipo" value="<?=$_SESSION['arrayCoches'][$posicion]['tipo']?>"/><br/><br/>
				<label>Caballos </label><input type="text" name="caballos" value="<?=$_SESSION['arrayCoches'][$posicion]['tipo']?>"/><br/>
		    		<label>Imagen </label><input type="text" name="img" value="<?=$_SESSION['arrayCoches'][$posicion]['img']?>"/><br/><br/>
		    		<input type="hidden" name="posicion" value="<?=$posicion?>" />
		    		<input type="submit" name="actualizar" value="Actualizar" /><br/><br/>
		    	</form>
		<?php
	    	}
	    	else if(isset($_POST['actualizar'])){
	    		$posicion = $_POST['posicion'];
    			$car = [];
    			
    			$car['marca'] = $_POST['marca'];
    			$car['modelo'] = $_POST['modelo'];
    			$car['matricula'] = $_POST['matricula'];
    			$car['color'] = $_POST['color'];
    			$car['anyo'] = $_POST['anyo'];
    			$car['kms'] = $_POST['kms'];
			$car['precio'] = $_POST['precio'];
			$car['tipo'] = $_POST['tipo'];
			$car['caballos'] = $_POST['caballos'];
			$car['img'] = $_POST['img'];
    			
    			$arrayCoches = $_SESSION['arrayCoches'];
    			$arrayCoches[$posicion] = $car;	
    			$_SESSION['arrayCoches'] = $arrayCoches;
    			
	    		header("Location: https://www.dwes-ssl.com/coches/index.php");    		
	    	}
	    	else{
			echo "<a href='index.php'> Vuelve al inicio </a>";
	    	}

	    	?>
		
	</body>
</html>
