<?php
$title = 'Editar Perfil - MVM Mood';
require_once "models/ACL.php";
include 'views/header.php';
?>

<div class="settings-section">
	<h2>Editar Perfil</h2>

	<?php if (!empty($_SESSION['error'])): ?>
    	<p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
    	<?php unset($_SESSION['error']); ?>
	<?php endif; ?>

	<form method="POST" action="index.php?controller=Usuarios&action=editar">
    	<div class="form-group">
        	<label for="foto">Foto de Perfil</label>
        	<img src="assets/images/<?= htmlspecialchars($usuario->foto) ?>" class="profile-pic" alt="Foto Actual">
        	<input type="text" id="foto" name="foto" value="<?= htmlspecialchars($usuario->foto) ?>" placeholder="Nombre del archivo (ej: user.png)">
    	</div>
    	<div class="form-group">
        	<label for="nickname">Nickname</label>
        	<input type="text" id="nickname" name="nickname" value="<?= htmlspecialchars($usuario->nickname) ?>" required>
    	</div>
    	<div class="form-group">
        	<label for="email">Email</label>
        	<input type="email" id="email" name="email" value="<?= htmlspecialchars($usuario->email) ?>" required>
    	</div>
    	<button type="submit" name="guardar" class="save-btn">Guardar Cambios</button>
	</form>
</div>

<div class="settings-section">
	<h2>Opciones de Cuenta</h2>
	<div class="options">
    	<a href="index.php?controller=Usuarios&action=cambiarPassword_form">
        	<button class="option-btn">Cambiar Contraseña</button>
    	</a>
	</div>
</div>

<a href="index.php?controller=Usuarios&action=perfil">Volver al perfil</a>

<?php include 'views/footer.php'; ?>
