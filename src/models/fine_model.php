<?php
	class Fine {
		function setId($id) {
			$this->id = $id;
		}

		function setDt($dt) {
			$this->dt = $dt;
		}

		function setUserId($userId) {
			$this->userId = $userId;
		}

		function setOwnerId($ownerId) {
			$this->ownerId = $ownerId;
		}

		function setCamId($cameraId) {
			$this->camId = $cameraId;
		}

		function getUserId($name) {
			global $mysqli;
			$db_strings = $mysqli->query("SELECT userId FROM Db_users WHERE name = '$name'");
			$result = $db_strings->fetch_all(MYSQLI_ASSOC);

			if (empty($result)) {
				exit("Похоже, такого пользователя ещё нет!");
			} else {
				foreach ($result as $row) {
					$res = $row['userId'];
				}
				return $res;
			}
		}

		function getOwnerId($reg) {
			global $mysqli;
			$db_strings = $mysqli->query("SELECT cardId FROM Vehicle_owners WHERE carReg = '$reg'");
			$result = $db_strings->fetch_all(MYSQLI_ASSOC);

			if (empty($result)) {
				exit("Похоже, такого владельца ещё нет!");
			} else {
				foreach ($result as $row) {
					$res = $row['cardId'];
				}
				return $res;
			}
		}
		
		function output($flag) {
			global $mysqli;
			switch ($flag) {
				case 'a':
					$db_strings = $mysqli->query("SELECT * FROM Fines");
					$rows = $db_strings->fetch_all(MYSQLI_ASSOC);
					if (empty($rows)) {
						echo "Похоже, штрафов ещё нет!";
					} else {
						echo '<table>';
						echo '<tr><th>ID штрафа</th><th>Время выписки</th><th>Номер юзера</th><th>Паспорт водителя</th><th>Номер камеры</th></tr>';
						foreach ($rows as $row) {
							echo "<tr>";
							echo "<td>".$row["fineId"]."</td>";
							echo "<td>".$row["datetime"]."</td>";
							echo "<td>".$row["userId"]."</td>";
							echo "<td>".$row["ownerId"]."</td>";
							echo "<td>".$row["cameraId"]."</td>";
							if ($_SESSION['prv'] == 'admin') {
								echo "<td><a href='/settings/fine_setting.php?fineId=".$row['fineId']."&datetime=".$row['datetime']."&userId=".$row['userId']."&ownerId=".$row['ownerId']."&cameraId=".$row['cameraId']."'>Настроить</a></td>";
							}
							
							echo "</tr>";
						}
						echo "</table>";
					}
					break;
				case 'o':
					if (isset($_GET["fineId"])) {
						$this->setId($_GET["fineId"]);
						$this->setDt($_GET["datetime"]);
						$this->setUserId($_GET["userId"]);
						$this->setOwnerId($_GET["ownerId"]);
						$this->setCamId($_GET["cameraId"]);

						echo '<table>';
						echo '<tr><th>ID факта</th><th>ID камеры</th><th>Номер ТС</th><th>Ссылка на файл</th><th>Статус</th></tr>';
						echo "<td>".$this->id."</td>";
						echo "<td>".$this->dt."</td>";
						echo "<td>".$this->userId."</td>";
						echo "<td>".$this->ownerId."</td>";
						echo "<td>".$this->camId."</td>";
						echo "</table>";
					} else echo 'Выберите факт';
					break;	
			}
		}

		function addFine($camId, $userId, $dt, $ownerId) {
			global $mysqli;
			$result = $mysqli->query("INSERT Fines (datetime, userId, ownerId, cameraId) VALUES ('$dt', '$userId', '$ownerId', '$camId')");

			if ($result) {
				$this->setDt($dt);
				$this->setUserId($userId);
				$this->setOwnerId($ownerId);
				$this->setCamId($cameraId);
				echo "Вы успешно добавили штраф! Обновление страницы...";
				echo('<meta http-equiv="refresh" content="1; url=/views/fines_view.php">');
			}
		}

		function deleteFine() {
			global $mysqli;
			$result = $mysqli->query("DELETE FROM Fines WHERE fineId = '$this->id'");

			if ($result) {
				echo "Информация о штрафе была успешно удалена! Обновление страницы...";
				echo('<meta http-equiv="refresh" content="1; url=/views/fines_view.php">');
			} else {
				exit("Извините, не удалось удалить информацию о факте");
			}
		}
	}