<?php
	$title_name = 'Камеры';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/cameras.php';

	if ($_SESSION['prv'] == 'admin'): ?>
		<hr class="dashed">
		<p>Добавить камеру</p>
		<form action="" method="post">
			<label>Адрес расположения камеры и настройка:</label>
			<input name="newCamAddr" type="text" placeholder="Адрес" required>
			<input name="newCamSetting" list="newCamSetting" required>
			<datalist id="newCamSetting">
				<option value="line">Камера на разметку</option>
				<option value="speed">Камера на скорость</option>
				<option value="sign">Камера на знак</option>
			</datalist>
			<button type="submit">Добавить камеру</button>
		</form>
	<?php endif;
	
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';