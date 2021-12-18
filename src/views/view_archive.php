<?php
	$title_name = 'Поиск';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/search.php';
?>
<h2>Архив и поиск по базе данных</h2>

<h3>Фильтр камер</h3>
<form action="" method="post">
	<label>Вывести список камер по ID с</label>
	<input type="text" name="minId" placeholder="Введите номер камеры" required>
	<label>по</label>
	<input type="text" name="maxId" placeholder="Введите номер камеры" required>
	<label>, где адрес</label>
	<input type="text" name="address">
	<input type="submit">
</form>
<form> <!-- не работает -->
	<label>Вывести список камер по ID с</label>
	<input type="text" name="minId1" placeholder="Введите номер камеры" required>
	<label>по</label>
	<input type="text" name="maxId1" placeholder="Введите номер камеры" required>
	<label>, где настройка</label>
	<input list="settingList" name="settingList" required>
	<datalist id="settingList">
		<option value="line">Разметку</option>
		<option value="speed">Скорость</option>
		<option value="sign">Знак</option>
	</datalist>
	<input type="submit">
</form>
<hr class="dashed">

<h3>Фильтр ТС</h3>
<form action="" method="post">
	<label>Вывести список машин, где регистрационный номер или модель </label>
	<input type="text" name="carSearch" placeholder="Введите регистрационный номер или модель" required>
	<input type="submit">
</form>
<form action="" method="post">
	<label>Вывести список машин, где 3-я цифра в регистрационном номере</label>
	<input type="text" name="regStart" placeholder="Введите число" required>
	<input type="submit">
</form>
<hr class="dashed">

<h3>Фильтр владельцев</h3>
<form action="" method="post">
	<label>Вывести список владельцев, у которых паспорт с</label>
	<input type="text" name="ownerIdMin" placeholder="Введите номер паспорта" required>
	<label>до</label>
	<input type="text" name="ownerIdMax" placeholder="Введите номер паспорта" required>
	<label>, у которых имя содержит </label>
	<input type="text" name="ownerName">
	<input type="submit">
</form>
<hr class="dashed">

<h3>Фильтр фактов</h3> <!-- не работает -->
<form action="" method="post">
	<label>Вывести все факты</label><br>
	<input type="radio" name="status" value="1">Утверждённые</input><br>
	<input type="radio" name="status" value="0">Неутверждённые</input>
	<label>, где номер камеры</label>
	<input type="text" name="cameraId">
	<label>или номер ТС</label>
	<input type="text" name="regPlate">
	<input type="submit">
</form>
<hr class="dashed">

<h3>Фильтр штрафов</h3>
<form action="" method="post">
	<label>Вывести все номера штрафов с </label>
	<input type="text" name="fineId1" required>
	<label>по</label>
	<input type="text" name="fineId2">

	<input type="radio" name="dtfilter" value="earlier">Раньше</input>
	<label>или</label>
	<input type="radio" name="dtfilter" value="later">Позже</input>
	<label>с фильтром времени</label>
	<input type="datetime-local" name="datetime">

	<label>, где номер камеры</label>
	<input type="text" name="fineCameraId">
	<input type="submit">
</form>

<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';
?>