<?php
	$title_name = 'Настройки ТС';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/cars.php';
?>
<hr class="dashed">
<p>Сменить регистрационный номер</p>
<form action="" method="post">
	<label>Новая номер:</label>
	<input name="newReg" type="text" maxsize="11" placeholder="Номер" pattern="[A-Z0-9]{6,7} [A-Z0-9]{2,3}" required>
	<button type="submit">Сменить номер</button>
</form>
<p>Сменить модель ТС</p>
<form action="" method="post">
	<label>Новая модель:</label>
	<input name="newModel" type="text" placeholder="Лада Гранта" required>
	<button type="submit">Сменить модель</button>
</form>
<hr class="dashed">
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';