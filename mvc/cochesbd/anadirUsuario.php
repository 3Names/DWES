<html>
        <head>
            <title>Añadir usuario</title>
        </head>
        <body>
                <h2>Añadir usuario</h2>

		<?php
		session_start();
		#En el formulario pongo el campo de apellido, EX1
		#Añado otro rol en el formulario, EX3
                if (isset($_POST['adduser'])){
                ?>
                        <form action="anadirUsuario.php" method="POST">
				<label>Nombre usuario: </label><input type="text" name="nombre"/><br/><br/>
				<label>Apellido: </label><input type="text" name = "apellido"/><br/><br/>
                                <label>Contraseña </label><input type="text" name="contraseña"/><br/><br/>
				<label>Rol </label><select name="rol">
						<option>usuario</option>
						<option>admin</option>
						<option>contable</option>
						</select><br/><br/>
                                <input type="submit" name="newuser" value="Añadir"/><br/><br/>
                        </form>

                <?php
                }
                else if(isset($_POST['newuser'])){

                        include 'db.php';
			#Añado la variable de apellido, la igualo al valor del formulario y la inserto en el statement, EX1
			#Pongo el otro rol, EX3
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
                        $contrasena = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
			$rol = $_POST['rol'];
			if ($rol == "usuario") {
				$rol = "2";
			} else if ($rol == "admin"){
				$rol = "1";
			} else {
				$rol = "3";
			}

                        $stmt = $conn->prepare("INSERT INTO Usuarios(nombre, apellido, contraseña, rol) VALUES (?,?,?,?);");
                        $stmt->bind_param ('ssss',$nombre,$apellido,$contrasena,$rol);

                        $stmt->execute();
                        $stmt->close();
                        $conn->close();

                        header("Location: https://www.dwes-ssl.com/cochesbd/index.php");
                }
                else{
                        echo "Error. <a href='index.php'> Vuelva al inicio </a>";
                }
                ?>
        </body>
</html>

