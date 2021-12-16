<?php
	$title_name = 'Камеры';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/cameras.php';
?>
<hr class="dashed">
<p>Добавить камеру</p>
<form action="" method="post">
	<label>Адрес расположения камеры и настройка:</label>
	<input name="newCamAddr" type="text" placeholder="Адрес" required>
	<input name="newCamSetting" list="newCamSetting" required>
	<datalist id="newCamSetting">
		<option value="line"/>
		<option value="speed"/>
		<option value="sign"/>
	</datalist>
	<button type="submit">Добавить камеру</button>
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';