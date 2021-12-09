<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';

	function idSearch($tbl, $inputSearch) {
		// global $mysqli;
		$sql_search = match($tbl) {
			'Cameras' => "SELECT * FROM Cameras WHERE cameraId = $inputSearch or address like '%$inputSearch%'", // or setting = ".$inputSearch.",
			'Facts' => "SELECT * FROM Facts WHERE factId = $inputSearch or cameraId = $inputSearch or regPlate like '%$inputSearch%'",
			'Cars' => "SELECT * FROM Cars WHERE regPlate = $inputSearch or model like '%$inputSearch%'",
			'Vehicle_owners' => "SELECT * FROM Vehicle_owners WHERE cardId = $inputSearch or name like '%$inputSearch%' or carReg like '%$inputSearch%'",
			'Fines' => "SELECT * FROM Fines WHERE fineId = $inputSearch or userId = $inputSearch or ownerId = $inputSearch or datetime like '%$inputSearch%'", // or setting = ".$inputSearch."
		};

		global $mysqli;
		$search_result = $mysqli->query($sql_search);
		$rows = $search_result->fetch_all(MYSQLI_ASSOC);

		foreach ($rows as $row=>$result) {
			// echo "ID: ".$row['cameraId']."<br>";
			// echo "Адрес: ".$row['address']."<br>";
			// echo "Настройка:".$row['setting']."<br>";

			foreach ($result as $key=>$value) {
				echo $key."->".$value;
				echo '<br>';
				// echo $result[$key]."<br>";
			}
			// echo $result[$key]."<br>";
			
			echo '<hr>';
		}
	}

	$inputSearch = $_POST['search'];
	$inputTable = $_POST['table'];

	$tbl = match($inputTable) {
		'По камерам' => 'Cameras',
		'По фактам' => 'Facts',
		'По машинам' => 'Cars',
		'По владельцам' => 'Vehicle_owners',
		'По штрафам' => 'Fines',
	};
	
	
	idSearch($tbl, $inputSearch);
?>