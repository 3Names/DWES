<h1>Crear tarea - Patricio Salazar Ccoa</h1>

<form action="index.php?controller=Tareas&action=crear" method="POST">

	<input type="text" name="texto" placeholder="Descripción">

	<select name="estado">
    	<option value="pendiente">Pendiente</option>
    	<option value="iniciada">Iniciada</option>
    	<option value="finalizada">Finalizada</option>
	</select>

	<input type="text" name="autor" placeholder="Autor (opcional)">
	<input type="text" name="tema" placeholder="Tema">

	<input type="date" name="fecha_limite">

	<input type="submit" name="añadir" value="Guardar">
</form>
