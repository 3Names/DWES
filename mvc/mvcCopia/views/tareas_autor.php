<h1>Lista de tareas por autor - Patricio Salazar Ccoa</h1>
<a href="index.php?controller=Auth&action=logout">Salir</a><br>
<ul>
<?php foreach ($tareas as $t): ?>
    <li>
        Texto: <?= htmlspecialchars($t->texto) ?><br>
        Estado: <?= htmlspecialchars($t->estado) ?><br>
        Tema: <?= htmlspecialchars($t->tema) ?><br>
        Autor:<a href="index.php?controller=Tareas&action=filtrar&autor=<?= htmlspecialchars($t->autor)?>"><?= htmlspecialchars($t->autor) ?></a><br>
        Fecha límite: <?= htmlspecialchars($t->fecha_limite) ?><br>
        Prioridad: <?= htmlspecialchars($t->prioridad) ?><br>

        <a href="index.php?controller=Tareas&action=ver&id=<?= $t->id ?>">Ver detalles</a>

        <a href="index.php?controller=Tareas&action=eliminar&id=<?= $t->id ?>"
        onclick="return confirm('¿Seguro que quieres borrar esta tarea?')">
        Eliminar
        </a>
        <a href="index.php?controller=Tareas&action=editar&id=<?= $t->id ?>">Editar</a>
    </li>
<?php endforeach; ?>
</ul>
