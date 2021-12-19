<?php
	class Search {
		// public $tbl, $inputSearch;

		// function output($sql_str) {
		// 	global $mysqli;
		// 	$db_strings = $mysqli->query($sql_str);
		// 	$rows = $db_strings->fetch_all(MYSQLI_ASSOC);
	
			
		// 	foreach ($rows as $row=>$result) {
		// 		foreach ($result as $key=>$value) {
		// 			echo $key."->".$value;
		// 			echo '<br>';
		// 		}
		// 		echo '<hr>';
		// 	}
		// }

		// function getMaxCams() {
		// 	global $mysqli;
		// 	$db_strings = $mysqli->query("SELECT COUNT(*) FROM Cars");
		// 	$number = $db_strings->fetch_all(MYSQLI_ASSOC);
		// 	return $number;
		// }

		function output($sql, $flag) {
			global $mysqli;
			// echo $sql;
			$db_strings = $mysqli->query($sql);
			$rows = $db_strings->fetch_all(MYSQLI_ASSOC);
			
			if (empty($rows)) echo 'Результаты по вашему запросу не найдены<hr>'; 
			else {
				echo '<table><tr><th>';
				switch ($flag) {
					case 'cam':
						echo 'Номер камеры</th><th>Адрес</th><th>Настройка</th></tr>';
						foreach ($rows as $row) {
							echo "<tr>";
							echo "<td>".$row["cameraId"]."</td>";
							echo "<td>".$row["address"]."</td>";
							echo "<td>".$row["setting"]."</td>";
							echo "</tr>";
						}
						break;
					case 'car':
						echo 'Номер ТС</th><th>Модель</th></tr>';
						foreach ($rows as $row) {
							echo "<tr>";
							echo "<td>".$row["regPlate"]."</td>";
							echo "<td>".$row["model"]."</td>";
							echo "</tr>";
						}
						break;
					case 'own':
						echo 'Номер паспорта</th><th>Имя</th><th>Номер ТС</th></tr>';
						foreach ($rows as $row) {
							echo "<tr>";
							echo "<td>".$row["cardId"]."</td>";
							echo "<td>".$row["name"]."</td>";
							echo "<td>".$row["carReg"]."</td>";
							echo "</tr>";
						}
						break;
					case 'fc':
						echo 'Номер факта</th><th>Номер камеры</th><th>Номер ТС</th><th>Номер прикреплённого файла</th><th>Статус</th></tr>';
						foreach ($rows as $row) {
							echo "<tr>";
							echo "<td>".$row["factId"]."</td>";
							echo "<td>".$row["cameraId"]."</td>";
							echo "<td>".$row["regPlate"]."</td>";
							echo "<td>".$row["fileId"]."</td>";
							echo "<td>".$row["status"]."</td>";
							echo "</tr>";
						}
						break;
					case 'fn':
						echo 'Номер штрафа</th><th>Время</th><th>Номер пользователя</th><th>Номер владельца</th><th>Номер камеры</th></tr>';
						foreach ($rows as $row) {
							echo "<tr>";
							echo "<td>".$row["fineId"]."</td>";
							echo "<td>".$row["datetime"]."</td>";
							echo "<td>".$row["userId"]."</td>";
							echo "<td>".$row["ownerId"]."</td>";
							echo "<td>".$row["cameraId"]."</td>";
							echo "</tr>";
						}
						break;
				}
				echo "</th></tr></table>";
			}
			
		}

		function searchCameraId($minId, $maxId, $param) {
			echo gettype($param);
			if ($minId > $maxId) exit('Первое значение не может быть больше второго');
			if (gettype($param) == 'integer') $res = "SELECT * FROM Cameras WHERE (cameraId BETWEEN $minId AND $maxId) AND (setting = $param)";
			else $res = "SELECT * FROM Cameras WHERE (cameraId BETWEEN $minId AND $maxId) AND (address LIKE '%$param%')";

			return $res;
		}

		function carSearch($param) {
			$res_search = "SELECT * FROM Cars WHERE (regPlate = '$param') or (model like '%$param%')";
			return $res_search;
		}

		function regStart($param) {
			$res_search = "SELECT * FROM Cars WHERE regPlate like '__{$param}%'";
			return $res_search;
		}

		function ownerSearch($minId, $maxId, $param) {
			if ($minId > $maxId) exit('Первое значение не может быть больше второго');
			else $res = "SELECT * FROM Vehicle_owners WHERE (cardId BETWEEN $minId AND $maxId) AND name LIKE '%$param%'";

			return $res;
		}

		function factSearch($status, $prm) {
			echo gettype($prm);
			echo '<br>';
			echo $prm;
			if (gettype($prm) == 'integer') $res = "SELECT * FROM Facts WHERE status = $status and cameraId = $prm";
			elseif (gettype($prm) == 'string') $res = "SELECT * FROM Facts WHERE status = $status and regPlate = '$prm'";
			// elseif (gettype($prm) == 'NULL') $res = "SELECT * FROM Facts WHERE status = $status";
			// echo $inputSearch;
			return $res;
		}

		function fineSearch($min, $max, $dtfilter, $dt, $camId) {
			// echo $dtfilter;
			if ($dtfilter == 'later') $res = "SELECT * FROM Fines WHERE (fineId BETWEEN $min AND $max) AND (datetime >= '$dt') AND cameraId = $camId";
			else $res = "SELECT * FROM Fines WHERE (fineId BETWEEN $min AND $max) AND (datetime < '$dt') AND cameraId = $camId";
			return $res;
		}
	}
