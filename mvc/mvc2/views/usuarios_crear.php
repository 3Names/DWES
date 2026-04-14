<h1>Crear usuario - Patricio Salazar Ccoa</h1>

<form action="index.php?controller=Usuarios&action=crear" method="POST">

        <input type="text" name="usuario" placeholder="Nombre de usuario">
	<input type="password" name="password" placeholder="Contraseña">

	<select name="rol">
	<option value="admin">Admin</option>
	<option value="user">Usuario</option>
	<option value="observer">Observer</option>
        </select>

        <input type="submit" name="nuevo_usuario" value="Guardar">
</form>
