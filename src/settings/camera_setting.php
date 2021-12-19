<?php
	$title_name = 'Настройки камеры';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/cameras.php';

	if ($_SESSION['prv'] == 'admin') {
		echo '
			<hr class="dashed">
			<p>Сменить адрес камеры</p>
			
			<form action="" method="post">
				<label>Новый адрес:</label>
				<input name="newAddr" type="text" placeholder="ул. Иванова" required>
				<button type="submit">Сменить адрес</button>
			</form>
			<hr class="dashed">
			
			<p>Сменить настройку камеры</p>
			<form action="" method="post">
				<label>Новая настройка:</label>
				<input list="newSetting" name="newSetting" required>
				<datalist id="newSetting">
					<option value="line">Камера на разметку</option>
					<option value="speed">Камера на скорость</option>
					<option value="sign">Камера на знак</option>
				</datalist>
				<button type="submit">Поменять настройку</button>
			</form>
			
			<form action="" method="post">
				<button type="submit" name="deleteCamera">Удалить камеру</button>
			</form>
		';
	}
?>

<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';