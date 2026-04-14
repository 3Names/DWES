<?php
$title = 'Editar Publicación - MVM Mood';
require_once "models/ACL.php";
include 'views/header.php';
?>

<h2>Editar Publicación</h2>

<?php if (!empty($_SESSION['error'])): ?>
	<p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
	<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<div class="create-post">
	<form method="POST" action="index.php?controller=Publicaciones&action=editar">
    	<input type="hidden" name="id" value="<?= $publicacion['id'] ?>">
    	<textarea name="contenido" required maxlength="500"><?= htmlspecialchars($publicacion['contenido']) ?></textarea>
    	<button type="submit" name="guardar">Actualizar</button>
	</form>
</div>

<a href="index.php">Volver al inicio</a>

<?php include 'views/footer.php'; ?>
