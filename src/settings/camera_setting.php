<?php
	$title_name = 'Настройки камеры';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/cameras.php';
?>
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
		<option value="line"/>
		<option value="speed"/>
		<option value="sign"/>
	</datalist>
	<button type="submit">Поменять настройку</button>
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';