<h1>Detalle de la tarea - Patricio Salazar Ccoa</h1>

<form action="index.php?controller=Tareas&action=editar_form" method="POST">

	<input type="text" name="texto" placeholder="Descripción" value="<?=htmlspecialchars($tarea->texto)?>">

	<select name="estado" value="<?=$tarea->estado ?>">
        	<option value="pendiente">Pendiente</option>
        	<option value="iniciada">Iniciada</option>
        	<option value="finalizada">Finalizada</option>
        </select>

	<input type="text" name="autor" placeholder="Autor (opcional)" value="<?=$tarea->autor ?? 'Personal'?>">
	<input type="text" name="tema" placeholder="Tema" value="<?= $tarea->tema ?>">
	<input type="date" name="fecha_limite" value="<?= $tarea->fecha_limite ?>">
	<select name="prioridad" value="<?=$tarea->prioridad ?>">
                <option value="1">1</option>
                <option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
        </select>
	<input type="hidden" name="id" value="<?= $tarea->id ?>">
        <input type="submit" name="editar" value="Update">
</form>          
