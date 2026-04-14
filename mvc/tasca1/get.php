<html>
<head>
<title>GET</title>
</head>
<body>
Enviados
<ul>
<?php
echo "<li>".$_GET["name"]."</li><br/>";
echo "<li>".$_GET["surname"]."</li><br/>";
echo "<li>".$_GET["age"]."</li><br/>";
echo "<li>".$_GET["dni"]."</li><br/>";
echo "<li>".$_GET["password"]."</li><br/>";
?>
</ul>
</body>
</html>
