<html>
	<head>
	    <title>Añadir coche</title>
	</head>
	<body>
		<h2>Añadir coche</h2>
	    	
	    	<?php
    		session_start();
    		
    		if (isset($_POST['addcar'])){
    		?>
	    		<form action="añadirCoche.php" method="POST">
		    		<label>Marca </label><input type="text" name="marca"/><br/><br/>
		    		<label>Modelo </label><input type="text" name="modelo"/><br/><br/>
		    		<label>Matrícula </label><input type="text" name="matricula"/><br/><br/>
		    		<label>Color </label><input type="text" name="color"/><br/><br/>
		    		<label>Año de fabricación </label><input type="text" name="anyo"/><br><br/>
		    		<label>Kilometros </label><input type="text" name="kms"/><br/><br/>
				<label>Precio </label><input type="text" name="precio"/><br/><br/>
				<label>Tipo </label><input type="text" name="tipo"/><br/><br/>
				<label>Numero de caballos </label><input type="text" name="caballos"/><br/><br/>
				<label>Imagen</label><input type="text" name="img"/><br/><br/>

		    		<input type="submit" name="newcar" value="Guardar"/><br/><br/>	    	
	    		</form>
    		
    		<?php
    		}
    		else if(isset($_POST['newcar'])){
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
    			array_push($arrayCoches, $car);	
    			$_SESSION['arrayCoches'] = $arrayCoches;
    			
    			header("Location: https://www.dwes-ssl.com/coches/index.php");		    			    			
    		}
    		else{
			echo "Error. <a href='index.php'> Vuelva al inicio </a>";
    		}
		?>
	</body>
</html>
