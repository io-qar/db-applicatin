<?php
	$title_name = 'Транспортные средства';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/cars.php';
?>
<hr class="dashed">
<p>Добавить ТС</p>
<form action="" method="post">
	<label>Номер ТС и модель ТС:</label>
	<input name="newCarReg" type="text" maxsize="11" placeholder="Номер" pattern="[A-Z0-9]{6,7} [A-Z0-9]{2,3}" required>
	<input name="newCarModel" type="text" placeholder="Лада Гранта" required>
	<button type="submit">Добавить ТС</button>
</form>

<details>
	<summary>Показать связанные таблицы</summary>
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'/controllers/owners.php';
	?>
</details>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';