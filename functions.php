<?php //Kõik andmebaasidega seoduv AB
		
	//loome AB ühenduse
    require_once("../config_global.php");
    $database = "if15_skmw";
   
	//selleks, et kuvada tabel lehel vĆ¤lja. 
	function getAllData(){
		
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
	//kuna küsimärke pole, siis bind_param jääb vahele.
	
	//seob selle, mis tabelist saadud, nende muutujatega bind result.
		$stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
		$stmt->execute();
		
		//tekitame massiivi, kus hoiame auto nr KUHU.
		$array = array();
		
		
		//iga rea kohta mid on ab's
        while($stmt->fetch()){
			
           //suvaline muutuja, kus hoiame auto andmeid selle hetkeni kui lisame massiivi
		   
		   //StdClass on tühi objekt, kus hoiame väärtusi. MIDA
		   $car = new StdClass();
		   
		   $car->id = $id_from_db;
		   $car->user_id = $user_id_from_db;
		   $car->number_plate = $number_plate_from_db;
		   $car->color = $color_from_db;
		   
		   
		   
		   //lisan massiivi. esiteks, KUHU lisame, teiseks, MIDA.
		   
		   array_push($array, $car);
		   //var_dump võib echo asemel kasutada kui error on. annab andmed välja
		   //echo "<pre>";
		   //var_dump($array);
		   //echo "</pre>"; //selleks, et korrastaks var_dump andmeid.

        }
		//peale while tsüklit tagastame, et saaks table.php kasutada seda.
		return $array;

        $stmt->close();
		$mysqli->close();
		
	}

?>


