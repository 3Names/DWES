<html>
<head>
	<title>Hotel</title>
</head>
<body>
	<h1>Ocupación del hotel:</h1>
	<ul>
	<?php
	$numPlantas = 5;
	$numHabitaciones = 10;
	$personasxHab = 4;
	$hotel = array(
		array(1,2,3,4,5,6,7,8,9,10),
		array(1,2,3,4,5,6,7,8,9,10),
		array(1,2,3,4,5,6,7,8,9,10),
		array(1,2,3,4,5,6,7,8,9,10),
		array(1,2,3,4,5,6,7,8,9,10),
	);
	function listar_vacias($hotel) {
		$habvacias = array();

		for ($piso = 1; $piso <= $numPlantas; $piso++) {
			for ($habitacion = 1; $habitacion <= $numHabitaciones; $habitacion++) {
				if ($hotel[$piso][$habitacion] === 0) {
					$habvacias = array(
						"piso" => $piso,
						"habitacion" => $habitacion
					);
				}
			};
		};
		return $habvacias;
	};
	function listar_llenas($hotel) {
                $habllenas = array();

                for ($piso = 1; $piso <= $numPlantas; $piso++) {
                        for ($habitacion = 1; $habitacion <= $numHabitaciones; $habitacion++) {
                                if ($hotel[$piso][$habitacion] === 0) {
                                        $habvacias = array(
                                                "piso" => $piso,
                                                "habitacion" => $habitacion
                                        );
                                }
                        };
                };
                return $habllenas;
        };

	for ($piso = 1; $piso <= $numPlantas; $piso++){
		for ($habitacion = 1; $habitacion <= $numHabitaciones; $habitacion++) {
			$hotel[$piso][$habitacion] = rand(0,$personasxHab);
			$ocupacion = $hotel[$piso][$habitacion];
			echo "<li>Piso $piso, habitacion $habitacion tiene: $ocupacion personas</li><br>";
		};
	};
	
	?>
	</ul>
</body>
</html>
