<?php
$title = 'Detalle de Publicación - MVM Mood';
require_once "models/ACL.php";
include 'views/header.php';
?>

<h2>Detalle de la Publicación</h2>

<div class="post">
	<div class="post-header">
    	<img src="assets/images/<?= htmlspecialchars($publicacion['usuario_foto']) ?>" alt="<?= htmlspecialchars($publicacion['nickname']) ?>" class="avatar">
    	<div>
        	<div class="post-author"><?= htmlspecialchars($publicacion['nickname']) ?></div>
        	<div class="post-meta"><?= date('d/m/Y H:i', strtotime($publicacion['fecha'])) ?></div>
    	</div>
	</div>
	<div class="post-content"><?= nl2br(htmlspecialchars($publicacion['contenido'])) ?></div>
</div>

<a href="index.php">Volver al inicio</a>

<?php include 'views/footer.php'; ?>
