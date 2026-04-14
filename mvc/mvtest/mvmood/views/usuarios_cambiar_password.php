<?php
$title = 'Cambiar Contraseña - MVM Mood';
require_once "models/ACL.php";
include 'views/header.php';
?>

<div class="settings-section">
	<h2>Cambiar Contraseña</h2>

	<?php if (!empty($_SESSION['error'])): ?>
    	<p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
    	<?php unset($_SESSION['error']); ?>
	<?php endif; ?>

	<form method="POST" action="index.php?controller=Usuarios&action=cambiarPassword">
    	<div class="form-group">
        	<label for="password_actual">Contraseña Actual</label>
        	<input type="password" id="password_actual" name="password_actual" required>
    	</div>
    	<div class="form-group">
        	<label for="password_nueva">Nueva Contraseña</label>
        	<input type="password" id="password_nueva" name="password_nueva" required minlength="6">
    	</div>
    	<div class="form-group">
        	<label for="password_confirmar">Confirmar Nueva Contraseña</label>
        	<input type="password" id="password_confirmar" name="password_confirmar" required minlength="6">
    	</div>
    	<button type="submit" name="guardar" class="save-btn">Cambiar Contraseña</button>
	</form>
</div>

<a href="index.php?controller=Usuarios&action=editar_form">Volver a configuración</a>

<?php include 'views/footer.php'; ?>
