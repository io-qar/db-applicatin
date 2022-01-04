<?php
	class File {
		function setId($id) {
			$this->id = $id;
		}

		function setLink($link) {
			$this->link = $link;
		}

		function output($flag, $sort_sql) {
			global $mysqli;

			$sort_list = array(
				'fileId_asc' => '`fileId`',
				'fileId_desc' => '`fileId` DESC',
				'fileLink_asc' => '`fileLink`',
				'fileLink_desc' => '`fileLink` DESC'
			);

			$sort = @$_GET['sort'];
			if (array_key_exists($sort, $sort_list)) {
				$sort_sql = $sort_list[$sort];
			} else $sort_sql = reset($sort_list);

			switch ($flag) {
				case 'a':
					$db_strings = $mysqli->query("SELECT * FROM Files ORDER BY $sort_sql");
					$rows = $db_strings->fetch_all(MYSQLI_ASSOC);
					if (empty($rows)) {
						echo 'Похоже, файлов ещё нет!';
					} else {
						echo '<table><tr><th>';
						echo sort_link_th('ID файла', 'fileId_asc', 'fileId_desc');
						echo '</th><th>Ссылка</th></tr>';
						foreach ($rows as $row) {
							echo '<tr><td>'.$row['fileId'].'</td>';
							echo '<td>'.$row['fileLink'].'</td>';
							if ($_SESSION['prv'] == 'admin') {
								echo "<td><a href='/settings/file_setting.php?fileId=".$row['fileId']."&fileLink=".$row['fileLink']."'>Настроить</a></td>";
							}
							echo '</tr>';
						}
						echo '</table>';
					}
					break;
				case 'o':
					if (isset($_GET['fileId'])) {
						$this->setId($_GET['fileId']);
						$this->setLink($_GET['fileLink']);

						echo '<table><tr><th>ID файла</th><th>Ссылка</th></tr>';
						echo '<td>'.$this->id.'</td>';
						echo '<td>'.$this->link.'</td>';
						echo '</table>';
					} else echo 'Выберите файл';
					break;
			}
		}

		function addFile($link) {
			global $mysqli;
			$result = $mysqli->query("INSERT Files (fileLink) VALUES ('$link')");

			if ($result) {
				$this->setLink($camId);
				echo "<br>Вы успешно добавили файл №'$this->id'! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/files_view.php">';
			}
		}

		function changeLink($newLink) {
			global $mysqli;
			$result = $mysqli->query("UPDATE Files SET fileLink = '$newLink' WHERE fileId = '$this->id'");

			if ($result) {
				$this->setLink($newLink);
				echo "<br>Вы успешно сменили ссылку на '$this->newLink'! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/files_view.php">';
			}
		}

		function deleteFile() {
			global $mysqli;
			$result = $mysqli->query("DELETE FROM Files WHERE factId = '$this->id'");

			if ($result) {
				echo "<br>Информация о файле была успешно удалена! Обновление страницы...";
				echo '<meta http-equiv="refresh" content="1; url=/views/files_view.php">';
			}
		}
	}