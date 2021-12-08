<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';

	function idSearch($db, $inputSearch) {
		$id = lcfirst(substr($db, 0, -1).'Id');

		$sql_search = "SELECT * FROM $db WHERE $id = $inputSearch";

		global $mysqli;
		$search_result = $mysqli->query($sql_search);
		$rows = $search_result->fetch_all(MYSQLI_ASSOC);

		foreach ($rows as $row=>$result) {
			// echo $row[$id]."<br>";
			// echo "Адрес: ".$row['address']."<br>";
			// echo "Настройка:".$row['setting']."<br>";

			foreach ($result as $key=>$value) {
				echo $key."->".$value;
				echo '<br>';
			}
			echo '<hr>';
		}
	}

	$inputSearch = $_POST['search'];
	$inputTable = $_POST['table'];

	$db = match($inputTable) {
		'По камерам' => 'Cameras',
		'По фактам' => 'Facts',
		'По машинам' => 'Cars',
		'По владельцам' => 'Vehicle_owners',
		'По штрафам' => 'Fines',
	};
	
	
	idSearch($db, $inputSearch);
?>