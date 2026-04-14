<?php
$title = 'Perfil - MVM Mood';
require_once "../models/ACL.php";
include 'header.php';
?>

<?php if (!empty($_SESSION['mensaje'])): ?>
	<p class="ok"><?= htmlspecialchars($_SESSION['mensaje']) ?></p>
	<?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

<div class="settings-section">
	<h2>Perfil de <?= htmlspecialchars($usuario->nickname) ?></h2>

	<div style="text-align: center; margin: 20px 0;">
    	<img src="assets/images/<?= htmlspecialchars($usuario->foto) ?>" class="profile-pic" alt="Foto de Perfil" style="width: 100px; height: 100px;">
	</div>

	<p><strong>Email:</strong> <?= htmlspecialchars($usuario->email) ?></p>
	<p><strong>Nickname:</strong> <?= htmlspecialchars($usuario->nickname) ?></p>
	<p><strong>Rol:</strong> <?= htmlspecialchars($usuario->rol) ?></p>

	<?php if ($usuario->id == $_SESSION['id']): ?>
    	<a href="index.php?controller=Usuarios&action=editar_form">Editar Perfil</a>
	<?php endif; ?>
</div>

<h2>Publicaciones de <?= htmlspecialchars($usuario->nickname) ?></h2>

<?php if (empty($publicaciones)): ?>
	<div class="post">
    	<p>Este usuario aún no ha publicado nada.</p>
	</div>
<?php else: ?>
	<?php foreach ($publicaciones as $p): ?>
    	<div class="post">
        	<div class="post-header">
            	<img src="assets/images/<?= htmlspecialchars($p['usuario_foto']) ?>" alt="<?= htmlspecialchars($p['nickname']) ?>" class="avatar">
            	<div>
                	<div class="post-author"><?= htmlspecialchars($p['nickname']) ?></div>
                	<div class="post-meta"><?= date('d/m/Y H:i', strtotime($p['fecha'])) ?></div>
            	</div>
        	</div>
        	<div class="post-content"><?= nl2br(htmlspecialchars($p['contenido'])) ?></div>
        	<div class="post-actions">
            	<a href="index.php?controller=Publicaciones&action=ver&id=<?= $p['id'] ?>" class="action-btn">👁️ Ver detalles</a>
            	<?php if ($p['idUsuario'] == $_SESSION['id'] || ACL::puede('publicaciones.eliminar')): ?>
                	<a href="index.php?controller=Publicaciones&action=editar_form&id=<?= $p['id'] ?>" class="action-btn">✏️ Editar</a>
                	<a href="index.php?controller=Publicaciones&action=eliminar&id=<?= $p['id'] ?>" class="action-btn" onclick="return confirm('¿Seguro que quieres eliminar esta publicación?')">🗑️ Eliminar</a>
            	<?php endif; ?>
        	</div>
    	</div>
	<?php endforeach; ?>
<?php endif; ?>

<a href="index.php">Volver al inicio</a>

<?php include 'views/footer.php'; ?>

