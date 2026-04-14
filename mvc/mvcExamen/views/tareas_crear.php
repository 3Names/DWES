<h1>Crear tarea - Patricio Salazar Ccoa</h1>
<?php if (!empty($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error'] ?></p>
        <?php unset($_SESSION['error']); ?>
<?php endif; ?>
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
	
	<select name="prioridad">
        	<option value="1">1</option>
        	<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
        </select>

	<input type="submit" name="añadir" value="Guardar">
</form>
