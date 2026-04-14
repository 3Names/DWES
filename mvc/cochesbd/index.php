<html>
	<head>
	    <title>Venta Coches</title>
	</head>
	<body>
	<h2>Coches disponibles</h2>

		<?php
		session_start();
		
		include 'db.php';
		include 'filtro_color.php';
		include 'primer_usuario.php';
		
		$loggedAdmin = $_SESSION['admin'];
		$loggedUser = $_SESSION['user'];
		$loggedContable = $_SESSION['contable'];
		$nombre = $_SESSION['nombre'];
		$apellido = $_SESSION['apellido'];
		if (!isset($_SESSION['admin']) && !isset($_SESSION['user']) && !isset($_SESSION['contable'])){
			if (isset($_POST['comprobar'])){ 
				$sql = "SELECT * FROM Usuarios";
				$result = $conn->query($sql);
				$usuario = $_POST['usuario'];
				$contrasena = $_POST['contraseña'];
				if ($result->num_rows >= 1) {
					while($row = $result->fetch_assoc()){
						$hash = $row['contraseña'];
						if ($usuario == $row['nombre'] && password_verify($contrasena,$hash) && $row['rol'] == 1) {
							$loggedAdmin = true;
							$loggedUser = false;
							$loggedContable = false;
							$_SESSION['admin'] = $loggedAdmin;
							$_SESSION['user'] = $loggedUser;
							$_SESSION['contable'] = $loggedContable;
							$_SESSION['nombre'] = $row['nombre'];
							$_SESSION['apellido'] = $row['apellido'];
							$nombre = $_SESSION['nombre'];
                                                        $apellido = $_SESSION['apellido'];
						} else if ($usuario == $row['nombre'] && password_verify($contrasena,$hash) && $row['rol'] == 2) {
							$loggedAdmin = false;
							$loggedUser = true;
							$loggedContable = false;
							$_SESSION['admin'] = $loggedAdmin;
							$_SESSION['user'] = $loggedUser;
							$_SESSION['contable'] = $loggedContable;
							$_SESSION['nombre'] = $row['nombre'];
							$_SESSION['apellido'] = $row['apellido'];
							$nombre = $_SESSION['nombre'];
							$apellido = $_SESSION['apellido'];
						} else if ($usuario == $row['nombre'] && password_verify($contrasena,$hash) && $row['rol'] == 3) {
                                                        $loggedAdmin = false;
							$loggedUser = false;
							$loggedContable = true;
                                                        $_SESSION['admin'] = $loggedAdmin;
							$_SESSION['user'] = $loggedUser;
							$_SESSION['contable'] = $loggedContable;
                                                        $_SESSION['nombre'] = $row['nombre'];
                                                        $_SESSION['apellido'] = $row['apellido'];
                                                        $nombre = $_SESSION['nombre'];
                                                        $apellido = $_SESSION['apellido'];
                                                }
					}
					if ($_SESSION['admin'] == false && $_SESSION['user'] == false && $_SESSION['contable'] == false) {
                		        	echo "Datos incorrectos";
		                	}
				}
			}
		}
		if ($_SESSION['admin'] == false && $_SESSION['user'] == false && $_SESSION['contable'] == false) {
                        include 'login.html';
		} else if ($_SESSION['admin'] == true) {
			echo "Hola ".$nombre." ".$apellido."<br/>";
                        echo "<a href='session_destroy.php'>Desconectar</a><br/><br/>";
		} else if ($_SESSION['user'] == true) {
			echo "Hola ".$nombre." ".$apellido."<br/>";
                        echo "<a href='session_destroy.php'>Desconectar</a><br/><br/>";
		} else if ($_SESSION['contable'] == true) {
			echo "Hola ".$nombre." ".$apellido."<br/>";
                        echo "<a href='session_destroy.php'>Desconectar</a><br/><br/>";
		}

		$sql = "SELECT * FROM coches;";
		$result = $conn->query($sql);
		
		if ($result->num_rows >= 1){
                	while($row = $result->fetch_assoc()){
				echo "Marca: ".$row['marca']." Modelo: ".$row['modelo']." Color: ".$row['color']."<br/>"; 
				if ($loggedAdmin || $loggedUser) {
					include 'boton.php';
				} else {
					echo "<form action='detalleCoche.php' method='POST'>";
                                        echo "<input type='hidden' name='posicion' value='".$row['id']."'>";
                                        echo "<input type='submit' name='detalle' value='Detalles'>";
                                        echo "</form>";
				}
			}
		}
		$conn->close();
		
		if($_SESSION['user'] || $_SESSION['admin'] == true) {
			echo "<form action='anadirCoche.php' method='POST'>";
			echo "<input type='submit' name='addcar' value='Añadir coche'/>";
			echo "</form>";
		}

		if($_SESSION['admin'] == true) {
			echo "<form action='anadirUsuario.php' method='POST'>";
			echo "<input type='submit' name='adduser' value='Añadir usuario'/>";
			echo "</form>";
		}

		if($_SESSION['contable'] == true) {
			echo "<form action='filtroContable.php' method='POST'>";
			echo "<input type='submit' name='vendidos' value='Filtrar vendidos'/>";
			echo " ";
			echo "<input type='submit' name='novendidos' value='Filtrar no vendidos'/>";
			echo "</form>";
		}
		?>
	</body>
</html>
