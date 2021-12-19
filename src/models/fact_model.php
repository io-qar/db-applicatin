<?php
	class Fact {
		function setId($id) {
			$this->id = $id;
		}

		function setCamId($camId) {
			$this->camId = $camId;
		}

		function setCarReg($carReg) {
			$this->carReg = $carReg;
		}

		function setFileId($fileId) {
			$this->fileId = $fileId;
		}

		function setStatus($status) {
			$this->status = $status;
		}

		function output($flag, $sort_sql) {
			global $mysqli;

			$sort_list = array(
				'factId_asc' => '`factId`',
				'factId_desc' => '`factId` DESC',
				'cameraId_asc' => '`cameraId`',
				'cameraId_desc' => '`cameraId` DESC',
				'regPlate_asc' => '`regPlate`',
				'regPlate_desc' => '`regPlate` DESC',
				'fileId_asc' => '`fileId`',
				'fileId_desc' => '`fileId` DESC',
				'status_asc' => '`status`',
				'status_desc' => '`status` DESC'
			);

			$sort = @$_GET['sort'];
			if (array_key_exists($sort, $sort_list)) {
				$sort_sql = $sort_list[$sort];
			} else $sort_sql = reset($sort_list);

			switch ($flag) {
				case 'a':
					$db_strings = $mysqli->query("SELECT * FROM Facts ORDER BY $sort_sql");
					$rows = $db_strings->fetch_all(MYSQLI_ASSOC);
					if (empty($rows)) {
						echo "Похоже, фактов нарушений ещё нет!";
					} else {
						echo '<table>';
						echo '<tr><th>';
						echo sort_link_th('ID факта', 'factId_asc', 'factId_desc'); echo '</th><th>ID камеры</th><th>Номер ТС</th><th>Ссылка на файл</th><th>Статус</th></tr>';
						foreach ($rows as $row) {
							echo "<tr>";
							echo "<td>".$row["factId"]."</td>";
							echo "<td>".$row["cameraId"]."</td>";
							echo "<td>".$row["regPlate"]."</td>";
							echo "<td>".$row["fileId"]."</td>";
							echo "<td>".$row["status"]."</td>";

							if ($_SESSION['prv'] == 'admin') {
								echo "<td><a href='/settings/fact_setting.php?factId=".$row['factId']."&cameraId=".$row['cameraId']."&carReg=".$row['regPlate']."&fileId=".$row['fileId']."&status=".$row['status']."'>Настроить</a></td>";
							}
							if ($row['status'] == '1') {
								echo "<td><a href='fines_view.php?cameraId=".$row['cameraId']."&userName=".$_SESSION['name']."&carReg=".$row['regPlate']."'>Выписать штраф</a></td>";
							}
							echo "</tr>";
						}
						echo "</table>";
					}
					break;
				case 'o':
					if (isset($_GET["factId"])) {
						$this->setId($_GET["factId"]);
						$this->setCamId($_GET["cameraId"]);
						$this->setCarReg($_GET["carReg"]);
						$this->setFileId($_GET["fileId"]);
						$this->setStatus($_GET["status"]);

						echo '<table>';
						echo '<tr><th>ID факта</th><th>ID камеры</th><th>Номер ТС</th><th>Ссылка на файл</th><th>Статус</th></tr>';
						echo "<td>".$this->id."</td>";
						echo "<td>".$this->camId."</td>";
						echo "<td>".$this->carReg."</td>";
						echo "<td>".$this->fileId."</td>";
						echo "<td>".$this->status."</td>";
						echo "</table>";
					} else echo 'Выберите факт';
					break;
			}
		}

		function addFact($camId, $carReg, $fileId) {
			global $mysqli;
			$result = $mysqli->query("INSERT Facts (cameraId, regPlate, fileId) VALUES ('$camId', '$carReg', $fileId)");

			if ($result) {
				$this->setCamId($camId);
				$this->setCarReg($carReg);
				$this->setFileId($fileId);
				echo "<br>Вы успешно добавили факт нарушения №'$this->id' ТС с номером '$this->carReg', который зафиксировала камера №'$this->camId'! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/facts_view.php">';
			}
		}

		function changeReg($newReg) {
			global $mysqli;
			$result = $mysqli->query("UPDATE Facts SET regPlate = '$newReg' WHERE factId = '$this->id'");

			if ($result) {
				$this->setCarReg($newReg);
				echo "<br>Вы успешно сменили номер ТС в факте на '$this->carReg'! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/facts_view.php">';
			} else exit("Извините, не удалось сменить номер ТС на '$newReg'!");
		}

		function changeCamId($newId) {
			global $mysqli;
			$result = $mysqli->query("UPDATE Facts SET cameraId = '$newId' WHERE factId = '$this->id'");

			if ($result) {
				$this->setCamId($newId);
				echo "<br>Вы успешно сменили номер камеры в факте на '$this->id'! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/facts_view.php">';
			} else exit("Извините, не удалось сменить номер ТС на '$newId'!");
		}

		function changeStatus($state) {
			global $mysqli;
			$result = $mysqli->query("UPDATE Facts SET status = '$state' WHERE factId = '$this->id'");

			if ($result) {
				$this->setStatus($state);
				echo "<br>Вы успешно сменили статус факта на '$this->status'! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/facts_view.php">';
			} else exit("Извините, не удалось сменить статус на '$state'!");
		}

		function changeFileId($newFileId) {
			global $mysqli;
			$result = $mysqli->query("UPDATE Facts SET fileId = '$newFileId' WHERE factId = '$this->id'");

			if ($result) {
				$this->setFileId($newFileId);
				echo "<br>Вы успешно сменили номер файла на '$this->newFileId'! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/facts_view.php">';
			} else exit("Извините, не удалось сменить номер файла на '$newFileId'!");
		}

		function deleteFact() {
			global $mysqli;
			$result = $mysqli->query("DELETE FROM Facts WHERE factId = '$this->id'");

			if ($result) {
				echo "<br>Информация о факте была успешно удалена! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/facts_view.php">';
			} else exit("Извините, не удалось удалить информацию о факте");
		}
	}