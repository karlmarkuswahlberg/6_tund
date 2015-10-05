<?php //K�ik andmebaasidega seoduv AB
		
	//loome AB �henduse
    require_once("../config_global.php");
    $database = "if15_skmw";
   
	
	function getAllData(){
		
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
	//kuna küsimärke pole, siis bind_param jääb vahele.
		$stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
		$stmt->execute();
		
		//iga rea kohta teeme midagi. tsükkel. mis on andmebaasis
		while($stmt->fetch()){
			echo($user_id_from_db);
			
			//õnnestus, saime andmed kätte
			//kuidas saada need andmed massiivi
		}
        $stmt->close();
		$mysqli->close();
		
		
	}

?>


