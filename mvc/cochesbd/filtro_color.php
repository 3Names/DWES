<?php
$sql = 'SELECT color FROM coches;';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "<form action='lista_color.php' method='POST'>";
	echo "Filtrar por color: <br/><br/>";
	echo "<select name='color'>";
	echo "<option>".""."</option>";
	while($row = $result->fetch_assoc()) {
		echo "<option>".$row['color']."</option>";
	}
	echo "<select><br/><br/>";
	echo "<input type='submit' name='filtro' value='filtrar'/>";
	echo "</form><br/>";
}
?>
