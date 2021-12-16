<?php
	class Car {
		function setReg($reg) {
			$this->reg = $reg;
		}

		function setModel($model) {
			$this->model = $model;
		}

		function setOwner($owner) {
			$this->owner = $owner;
		}

		function output($flag) {
			global $mysqli;
			switch ($flag) {
				case 'a':
					$db_strings = $mysqli->query("SELECT * FROM Cars");
					$rows = $db_strings->fetch_all(MYSQLI_ASSOC);	
					
					echo '<table>';
					echo '<tr><th>Регистрационный номер ТС</th><th>Модель</th><th>Владелец</th></tr>';
					foreach ($rows as $row) {
						echo "<tr>";
						echo "<td>".$row["regPlate"]."</td>";
						echo "<td>".$row["model"]."</td>";
						echo "<td><a href=''>".$row["ownerId"]."</a></td>";
						echo "<td><a href='/settings/car_setting.php?regPlate=".$row['regPlate']."&model=".$row['model']."&ownerId=".$row['ownerId']."'>Настроить</a></td>";
						echo "</tr>";
					}
					echo "</table>";
					break;
				case 'o':
					if (isset($_GET["regPlate"])) {
						$this->setReg($_GET["regPlate"]);
						$this->setModel($_GET["model"]);
						$this->setOwner($_GET["ownerId"]);

						echo '<table>';
						echo '<tr><th>Регистрационный номер ТС</th><th>Модель</th><th>Владелец</th></tr>';
						echo "<td>".$this->reg."</td>";
						echo "<td>".$this->model."</td>";
						echo "<td>".$this->owner."</td>";
						echo "</table>";
					} else echo 'Выберите транспортное средство';
					break;	
			}
		}

		function addCar($reg, $model) {
			global $mysqli;
			$check = $mysqli->query("SELECT regPlate FROM Cars WHERE regPlate = '$reg'");
			$myrow = $check->fetch_array();

			if (!empty($myrow['regPlate'])) {
				exit("Извините, введённый вами регистрационный номер уже зарегистрирован. Введите другой регистрационный номер.");
			}

			$result = $mysqli->query("INSERT Cars (regPlate, model) VALUES ('$reg', '$model')");

			if ($result) {
				$this->setReg($reg);
				$this->setModel($model);
				echo "Вы успешно добавили ТС '$this->reg', модель '$this->model'! Обновление страницы...";
				echo('<meta http-equiv="refresh" content="1; url=/views/cars_view.php">');
			} else {
				exit("Извините, не удалось добавить ТС с номером '$reg'!");
			}
		}

		function changeReg($newReg) {
			global $mysqli;
			$check = $mysqli->query("SELECT regPlate FROM Cars WHERE '$newReg' = '$this->reg'");
			$myrow = $check->fetch_array();

			if (!empty($myrow['regPlate'])) {
				exit("Извините, введённый вами регистрационный номер уже зарегистрирован. Введите другой регистрационный номер.");
			}

			$result = $mysqli->query("UPDATE Cars SET regPlate = '$newReg' WHERE regPlate = '$this->reg'");

			if ($result) {
				$this->setReg($newReg);
				echo "Вы успешно сменили модель на '$this->reg'! Обновление страницы...";
				echo('<meta http-equiv="refresh" content="1; url=/views/cars_view.php">');
			} else {
				exit("Извините, не удалось сменить настройку на '$newReg'!");
			}
		}

		function changeModel($newModel, $reg) {
			global $mysqli;
			$result = $mysqli->query("UPDATE Cars SET model = '$newModel' WHERE regPlate = '$reg'");

			if ($result) {
				$this->setModel($newModel);
				echo "Вы успешно сменили модель на '$this->model'! Обновление страницы...";
				echo('<meta http-equiv="refresh" content="1; url=/views/cars_view.php">');
			} else {
				exit("Извините, не удалось сменить настройку на '$newModel'!");
			}
		}

		function deleteCar() {
			global $mysqli;
			$result = $mysqli->query("DELETE FROM Cars WHERE regPlate = '$this->reg'");

			if ($result) {
				echo "Информация о ТС была успешно удалена! Обновление страницы...";
				echo('<meta http-equiv="refresh" content="1; url=/views/cars_view.php">');
			} else {
				exit("Извините, не удалось удалить информацию о ТС");
			}
		}
	}