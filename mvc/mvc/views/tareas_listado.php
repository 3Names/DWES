<h1>Lista de tareas - Patricio Salazar Ccoa</h1>

<ul>
<?php foreach ($tareas as $t): ?>
    <li>
        Texto: <?= htmlspecialchars($t->texto) ?><br>
        Estado: <?= htmlspecialchars($t->estado) ?><br>
        Tema: <?= htmlspecialchars($t->tema) ?><br>
        Autor: <?= htmlspecialchars($t->autor) ?><br>
        Fecha límite: <?= htmlspecialchars($t->fecha_limite) ?><br>

        <a href="index.php?controller=Tareas&action=ver&id=<?= $t->id ?>">Ver detalles</a>
	
	<a href="index.php?controller=Tareas&action=eliminar&id=<?= $t->id ?>"
        onclick="return confirm('¿Seguro que quieres borrar esta tarea?')">
        Eliminar
	</a>
	<a href="index.php?controller=Tareas&action=editar&id=<?= $t->id ?>">Editar</a>
    </li>
<?php endforeach; ?>
</ul>

<a href="index.php?controller=Tareas&action=crear">
	Crear nueva tarea
</a>
