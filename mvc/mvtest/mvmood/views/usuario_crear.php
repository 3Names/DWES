<?php
$title = 'Crear Usuario - MVM Mood';
require_once "models/ACL.php";
include 'views/header.php';
?>

<h2>Crear Nuevo Usuario</h2>

<?php if (!empty($_SESSION['error'])): ?>
	<p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
	<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<form method="POST" action="index.php?controller=Usuarios&action=crear">

	<input type="email" name="email" placeholder="Email" required>
	<input type="text" name="nickname" placeholder="Nickname" required>
	<input type="password" name="password" placeholder="Contraseña" required>

	<select name="rol" required>
    	<option value="user">Usuario</option>
    	<option value="admin">Administrador</option>
	</select>

	<button type="submit">Guardar</button>
</form>

<a href="index.php">Volver al inicio</a>

<?php include 'views/footer.php'; ?>
