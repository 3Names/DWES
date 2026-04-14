<html>
<head>
<title>Editar coche</title>
</head>
<body>
	<h2>Editar coche</h2>
	
	<?php
	session_start();	

	include 'db.php';

	if (isset($_POST['editar'])){
		$id = $_POST['posicion'];
		$stmt = $conn->prepare("SELECT * FROM coches WHERE id = ?;");
		$stmt->bind_param('d',$id);
                $stmt->execute();
		$result = $stmt->get_result();
		#Añado el select de vendido y sus opciones, EX2
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
	?>
			<form action="editarCoche.php" method="POST">
				<input type="hidden" name="posicion" value="<?=$row['id']?>">
				<label>Marca </label><input type="text" name="marca" value="<?=$row['marca']?>"/><br/><br/>
				<label>Modelo </label><input type="text" name="modelo" value="<?=$row['modelo']?>"/><br/><br/>
				<label>Matrícula </label><input type="text" name="matricula" value="<?=$row['matricula']?>"/><br/><br/>
				<label>Color </label><input type="text" name="color" value="<?=$row['color']?>"/><br/><br/>
				<label>Año de fabricación </label><input type="text" name="anyo" value="<?=$row['año']?>"/><br><br/>
				<label>Kilometros </label><input type="text" name="kms" value="<?=$row['klms']?>"/><br/><br/>
				<label>Precio </label><input type="text" name="precio" value="<?=$row['precio']?>"/><br/><br/>
				<label>Vendido </label><select name="vendido" value="<?=$row['precio']?>">
							<option>si</option>
							<option>no</option>
							</select>
                        	<input type="submit" name="update" value="Guardar"/><br/><br/>
			</form>
<?php
		}
	}	
	else if(isset($_POST['update'])){

                        include 'db.php';
#Añado la variable vendido y la enlazo con la consulta, EX2
			$id = $_POST['posicion'];
			$marca = $_POST['marca'];
                        $modelo = $_POST['modelo'];
                        $matricula = $_POST['matricula'];
                        $color = $_POST['color'];
                        $anyo = $_POST['anyo'];
                        $kms = $_POST['kms'];
			$precio = $_POST['precio'];
			$vendido = $_POST['vendido'];

                        $stmt = $conn->prepare("UPDATE coches SET matricula=?, marca=?, modelo=?, color=?, año=?, klms=?, precio=?, vendido=? WHERE id=?;");
                        $stmt->bind_param ('ssssdddsi',$matricula,$marca,$modelo,$color,$anyo,$kms,$precio,$vendido,$id);

                        $stmt->execute();
                        $stmt->close();
                        $conn->close();

                        header("Location: https://www.dwes-ssl.com/cochesbd/index.php");
                }
                else {
                        echo "Error. <a href='index.php'> Vuelva al inicio </a>";
                }

	?>
</body>
</html>
