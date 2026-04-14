<?php
	echo "<form action='detalleCoche.php' method='POST'>";
        echo "<input type='hidden' name='posicion' value='".$row['id']."'>";
        echo "<input type='submit' name='detalle' value='Detalles'>";
        echo "</form>";

	echo "<form action='editarCoche.php' method='POST'>";
        echo "<input type='hidden' name='posicion' value='".$row['id']."'>";
        echo "<input type='submit' name='editar' value='Editar'>";
        echo "</form>";

	echo "<form action='eliminarCoche.php' method='POST'>";
        echo "<input type='hidden' name='posicion' value='".$row['id']."'>";
        echo "<input type='submit' name='eliminar' value='Eliminar'>";
        echo "</form><br/>";
?>
