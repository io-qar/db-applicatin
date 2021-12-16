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

		function output($flag) {
			global $mysqli;
			switch ($flag) {
				case 'a':
					$db_strings = $mysqli->query("SELECT * FROM Facts");
					$rows = $db_strings->fetch_all(MYSQLI_ASSOC);
					if (empty($rows)) {
						echo "Похоже, фактов нарушений ещё нет!";
						// break;
					} else {
						echo '<table>';
						echo '<tr><th>ID факта</th><th>ID камеры</th><th>Ссылка на файл</th><th>Статус</th></tr>';
						foreach ($rows as $row) {
							echo "<tr>";
							echo "<td>".$row["factId"]."</td>";
							echo "<td>".$row["cameraId"]."</td>";
							echo "<td>".$row["fileId"]."</td>";
							echo "<td>".$row["status"]."</td>";
							echo "<td><a href='/settings/camera_setting.php?factId=".$row['factId']."&cameraId=".$row['cameraId']."&fileId=".$row['fileId']."&status=".$row['status']."'>Настроить</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					break;
				case 'o':
					if (isset($_GET["factId"])) {
						$this->setId($_GET["factId"]);
						$this->setCamId($_GET["cameraId"]);
						$this->setFileId($_GET["fileId"]);
						$this->setStatus($_GET["status"]);

						echo '<table>';
						echo '<tr><th>ID факта</th><th>ID камеры</th><th>Ссылка на файл</th><th>Статус</th></tr>';
						echo "<td>".$this->id."</td>";
						echo "<td>".$this->camId."</td>";
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
				// $this->setId($camId);
				$this->setCamId($camId);
				$this->setCarReg($carReg);
				// $this->setStatus(false)
					$this->setFileId($fileId);
					echo "Вы успешно добавили факт нарушения №'$this->id' ТС с номером '$this->carReg', который зафиксировала камера №'$this->camId'! Обновление страницы...";
					echo('<meta http-equiv="refresh" content="1; url=/views/facts_view.php">');
			}
		}

		function showFact() {
			echo '<p>Добавить факт</p>';
			global $mysqli;

			$result = $mysqli->query("SELECT * FROM Cameras");
			// $rows = $result->fetch_all(MYSQLI_ASSOC);
			
			
				// foreach ($rows as $row) {
	
				// 	echo "<option value='".$row->cameraId."'>".$row->cameraId.", ".$row->address.", ".$row->setting."</option>";
					
				// }
				while ($row = $result->fetch_object()) echo "<option value='".$row->cameraId."'>".$row->cameraId.", ".$row->address.", ".$row->setting."</option>"; 
			
		}
	}