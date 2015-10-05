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
		
		//teeme nii, kuidas ei tohiks. ja hiljem teisiti.
		$row_nr = 0;
		
		
		//tekitame html tabeli
		echo "<table border=5>";
		echo "<tr><th>rea nr</th><th>auto nr märk</th></tr>";
		
		//1. variant whilega.
        // iga rea kohta mis on ab'is teeme midagi
        while($stmt->fetch()){
            //saime andmed kätte
			//sisestab tsükliga tabelisse.
		
			echo "<tr><td>$row_nr</td><td>$number_plate_from_db</td></tr>";
            //echo $row_nr." ".$number_plate_from_db." <br>";
            $row_nr++;
			
			
        }
		echo "</table>";
		
		
		//iga rea kohta teeme midagi. tsükkel. mis on andmebaasis. Seni kuni neid ridu on saadaval.
		
		//2. variant whilega.
		while($stmt->fetch()){
			echo($number_plate_from_db." ");
			
			//õnnestus, saime andmed kätte
			//kuidas saada need andmed massiivi
		}
        $stmt->close();
		$mysqli->close();
		
		
	}

?>


