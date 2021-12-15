<?php
	class Search {
		// public $tbl, $inputSearch;

		function output($sql_str) {
			global $mysqli;
			$db_strings = $mysqli->query($sql_str);
			$rows = $db_strings->fetch_all(MYSQLI_ASSOC);
	
			
			foreach ($rows as $row=>$result) {
				foreach ($result as $key=>$value) {
					echo $key."->".$value;
					echo '<br>';
				}
				echo '<hr>';
			}
		}

		// function idSearch($tbl, $inputSearch) {
		// 	$sql_search = match($tbl) {
		// 		'Cameras' => "SELECT * FROM Cameras WHERE cameraId = $inputSearch or address like '%$inputSearch%' or setting = '$inputSearch'",
		// 		'Facts' => "SELECT * FROM Facts WHERE factId = $inputSearch or cameraId = $inputSearch or regPlate like '%$inputSearch%'",
		// 		'Cars' => "SELECT * FROM Cars WHERE regPlate = $inputSearch or model like '%$inputSearch%'",
		// 		'Vehicle_owners' => "SELECT * FROM Vehicle_owners WHERE cardId = $inputSearch or name like '%$inputSearch%' or carReg like '%$inputSearch%'",
		// 		'Fines' => "SELECT * FROM Fines WHERE fineId = $inputSearch or userId = $inputSearch or ownerId = $inputSearch or datetime like '%$inputSearch%'", // or setting = ".$inputSearch."
		// 	};
		// 	return $sql_search;
		// }

		function cameraSearch($inputSearch) {
			return "SELECT * FROM Cameras WHERE cameraId = $inputSearch or address like '%$inputSearch%' or setting = '$inputSearch'";
		}

		function carSearch($inputSearch) {
			return "SELECT * FROM Cars WHERE model like '%$inputSearch%' or regPlate like '%$inputSearch%'";
		}

		function ownerSearch($inputSearch) {
			return "SELECT * FROM Vehicle_owners WHERE name like '%$inputSearch%' or carReg like '%$inputSearch%'";
		}

		function fineSearch($inputSearch) {
			// echo $inputSearch;
			return "SELECT * FROM Fines WHERE fineId = $inputSearch or ownerId = $inputSearch or setting = '$inputSearch' or datetime like '%$inputSearch%'";
		}
	}