<html>
<header>
</header>
<body>
	<h1>Error-Patricio Salazar Ccoa</h1>
		<?php if (!empty($_SESSION['error_fatal'])): ?>
		<p class="error_fatal"><?= $_SESSION['error_fatal'] ?></p>
		<?php else: ?>
		<p class="error_inesperado"><?="Ocurrio un error inesperado" ?></p>
		<?php unset($_SESSION['error_fatal']); ?>
		<?php endif; ?>

	<a href="index.php">Volver al inicio</a>
</body>
</html>
