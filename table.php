
<?php
	require_once("functions.php"); //selleks, et leiaks üles getAllData fn.
	//kõik mis functions.php tehti, kuvab siia.
	
	//saadan return andmed siia. kõik autod objektide kujul massiivis. 
	$car_array = getAllData();
	
?>

<h1>Autode tabel</h1>
<?php
	
	//autod ükshaaval läbi käia.
	for($i = 0; $i < count($car_array); $i++){
		
		//trükib nr lauad välja.
		echo $car_array[$i]->number_plate."<br>";
		
	}
	
?>