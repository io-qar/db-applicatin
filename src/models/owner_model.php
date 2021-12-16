<?php
	class Owner {
		function setId($id) {
			$this->cardId = $id;
		}

		function setName($name) {
			$this->name = $name;
		}

		function setCar($reg) {
			$this->carReg = $reg;
		}

		function output($flag) {
			global $mysqli;
			switch ($flag) {
				case 'a':
					$db_strings = $mysqli->query("SELECT * FROM Vehicle_owners");
					$rows = $db_strings->fetch_all(MYSQLI_ASSOC);	
					
					echo '<table>';
					echo '<tr><th>Паспорт</th><th>Имя</th><th>Номер ТС</th></tr>';
					foreach ($rows as $row) {
						echo "<tr>";
						echo "<td>".$row["cardId"]."</td>";
						echo "<td>".$row["name"]."</td>";
						echo "<td><a href=''>".$row["carReg"]."</a></td>";
						echo "<td><a href='/settings/owner_setting.php?cardId=".$row['cardId']."&name=".$row['name']."&carReg=".$row['carReg']."'>Настроить</a></td>";
						echo "</tr>";
					}
					echo "</table>";
					break;
				case 'o':
					if (isset($_GET["cardId"])) {
						$this->setId($_GET["cardId"]);
						$this->setName($_GET["name"]);
						$this->setCar($_GET["carReg"]);

						echo '<table>';
						echo '<tr><th>Паспорт</th><th>Имя</th><th>Номер ТС</th></tr>';
						echo "<td>".$this->cardId."</td>";
						echo "<td>".$this->name."</td>";
						echo "<td>".$this->carReg."</td>";
						echo "</table>";
					} else echo 'Выберите владельца ТС';
					break;	
			}
		}

		function addOwner($id, $name, $carReg) {
			global $mysqli;
			$check = $mysqli->query("SELECT cardId FROM Vehicle_owners WHERE cardId = '$id'");
			$myrow = $check->fetch_array();

			if (!empty($myrow['cardId'])) {
				exit("Извините, введённый вами регистрационный номер уже зарегистрирован. Введите другой регистрационный номер.");
			}

			$result = $mysqli->query("INSERT Vehicle_owners (cardId, name, carReg) VALUES ('$id', '$name', '$carReg')");

			if ($result) {
				$this->setId($id);
				$this->setName($name);
				$result1 = $mysqli->query("UPDATE Cars SET ownerId = $id where regPlate = '$carReg'");
				if ($result1) {
					$this->setCar($carReg);
					echo "Вы успешно добавили владельца с именем '$this->name', номером папорта '$this->cardId', владеющим ТС с номером '$this->carReg'! Обновление страницы...";
					echo('<meta http-equiv="refresh" content="1; url=/views/owners_view.php">');
				} else exit("Извините, не удалось добавить ТС с номером '$reg'!");
			}
		}

		function changeCardid($newId) {
			global $mysqli;
			$check = $mysqli->query("SELECT cardId FROM Vehicle_owners WHERE '$newId' = '$this->cardId'");
			$myrow = $check->fetch_array();
			// echo json_encode($myrow);	

			if (!empty($myrow['cardId'])) {
				exit("Извините, введённый вами номер паспорта уже зарегистрирован. Введите другой номер.");
			}

			$result = $mysqli->query("UPDATE Vehicle_owners SET cardId = '$newId' WHERE cardId = '$this->cardId'");
			if ($result) {
				$this->setId($newId);
				echo "Вы успешно сменили номер паспорта на '$this->cardId'! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/owners_view.php">';
			} else {
				exit("Извините, не удалось сменить номер паспорта на '$newId'!");
			}
		}

		function changeName($newName, $id) {
			global $mysqli;
			$result = $mysqli->query("UPDATE Vehicle_owners SET name = '$newName' WHERE cardId = '$id'");

			if ($result) {
				$this->setName($newName);
				echo "Вы успешно сменили имя владельца на '$this->name'! Обновление страницы...";
				echo('<meta http-equiv="refresh" content="1; url=/views/owners_view.php">');
			} else {
				exit("Извините, не удалось сменить настройку на '$newName'!");
			}
		}

		function changeReg($newReg, $id) {
			global $mysqli;
			$result = $mysqli->query("UPDATE Cars SET ownerId = '$newName' WHERE cardId = '$id'");

			if ($result) {
				$this->setName($newName);
				echo "Вы успешно сменили имя владельца на '$this->name'! Обновление страницы...";
				echo('<meta http-equiv="refresh" content="1; url=/views/owners_view.php">');
			} else {
				exit("Извините, не удалось сменить настройку на '$newName'!");
			}
		}

		function deleteOwner() {
			global $mysqli;
			$result = $mysqli->query("DELETE FROM Vehicle_owners WHERE cardId = '$this->cardId'");

			if ($result) {
				echo "Информация о владельце была успешно удалена! Обновление страницы...";
				echo('<meta http-equiv="refresh" content="1; url=/views/owners_view.php">');
			} else {
				exit("Извините, не удалось удалить информацию о владельце");
			}
		}
	}