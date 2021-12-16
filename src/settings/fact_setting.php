<?php
	$title_name = 'Настройки факта';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/facts.php';
?>
<hr class="dashed">
<p>Сменить номер камеры</p>
<form action="" method="post">
	<label>Новый номер:</label>
	<input name="newCamId" type="text" placeholder="Номер камеры" required>
	<button type="submit">Сменить номер камеры</button>
</form>
<p>Сменить регистрационный номер</p>
<form action="" method="post">
	<label>Новый номер:</label>
	<input name="newReg" type="text" maxsize="11" placeholder="Номер" pattern="[A-Z0-9]{6,7} [A-Z0-9]{2,3}" required>
	<button type="submit">Сменить номер ТС</button>
</form>
<hr class="dashed">
<p>Сменить статус</p>
<form action="" method="post">
	<label>Новый статус:</label>
	<input name="newStatus" list="status" required>
	<datalist id="status">
		<option value="1">Корректен</option>
		<option value="0">Некорректен</option>
	</datalist>
	<button type="submit">Сменить статус</button>
</form>
<hr class="dashed">
<p>Удалить факт</p>
<form action="" method="post">
	<button type="submit" name="deleteFact">Удалить факт</button>
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';