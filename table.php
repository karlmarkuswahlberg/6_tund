
<?php
	require_once("functions.php"); //selleks, et leiaks üles getAllData fn.
	//kõik mis functions.php tehti, kuvab siia.
	
	//kuulan, kas kasutaja tahab kustutada. aadressiribal ?delete=2 nt. selle järgi.
	if(isset($_GET["delete"])){
		
		//saadan kustutatava auto id
		deleteCarData($_GET["delete"]);
	}
	
	
	
	//saadan return andmed siia. kõik autod objektide kujul massiivis. 
	$car_array = getAllData();
	
?>

<h1>Autode tabel</h1>
<table border=1>
<tr>
	<th>ID</th>
	<th>Kasutaja ID</th>
	<th>Auto NR</th>
	<th>Värv</th>
	<th>Kustuta</th>
	
</tr>
<?php
	
	//autod ükshaaval läbi käia.
	for($i = 0; $i < count($car_array); $i++){
		
		//trükib nr lauad välja.
		//lihtsalt muutujad saab echoga ka jutumärkide sees. Aga kui juba klassid ja objektid, siis on vaja lõpetada ära ja punktide vahele.
		
		echo "<tr><td>".$car_array[$i]->id."</td>";
		echo "<td>".$car_array[$i]->user_id."</td>";
		echo "<td>".$car_array[$i]->number_plate."</td>";
		echo "<td>".$car_array[$i]->color."</td>";
		
		echo "<td><a href='?delete=".$car_array[$i]->id."'>X</a></td>";
		echo "</tr>";
		//echo $car_array[$i]->id."<br>";
		//echo $car_array[$i]->number_plate."<br>";
		
	}
	
?>
</table>