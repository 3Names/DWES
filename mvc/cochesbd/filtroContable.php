<?php
include 'db.php';

if(isset($_POST['vendidos'])) {
	$sql = "SELECT * FROM coches WHERE vendido = 'si';";
	$result = $conn->query($sql);
	$total = 0;
	if ($result->num_rows >= 1){
		while($row = $result->fetch_assoc()){
			echo "Matricula: ".$row['matricula']." Modelo: ".$row['modelo']." Marca: ".$row['marca']." Precio: ".$row['precio']."<br/><br/>";
			$total = $total + $row['precio'];
		}
		echo "Total facturado: ".$total."<br/><br/>";
	}
}

if (isset($_POST['novendidos'])) {
	$sql = "SELECT * FROM coches WHERE vendido = 'no';";    
        $result = $conn->query($sql);
        $total = 0;
        if ($result->num_rows >= 1){
                while($row = $result->fetch_assoc()){
                        echo "Matricula: ".$row['matricula']." Modelo: ".$row['modelo']." Marca: ".$row['marca']." Precio: ".$row['precio']."<br/><br/>";
                        $total = $total + $row['precio'];
                }
                echo "Total pendiente de facturar: ".$total."<br/><br/>";
	}
}
echo "<a href='index.php'>Volver</a>"
?>
