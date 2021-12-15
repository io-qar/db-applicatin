<?php
	$title_name = 'Поиск';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>
<h2>Архив и поиск по базе данных</h2>

<form action="/controllers/search.php" method="post">
	<label>Поиск информации о камерах</label>
	<input type="text" name="cameraSearch" placeholder="Введите параметр" required>
	<input type="submit">
</form>

<form action="/controllers/search.php" method="post">
	<label>Поиск информации о машинах</label>
	<input type="text" name="carSearch" placeholder="Введите имя модели или регистрационный номер" required>
	<input type="submit">
</form>

<form action="/controllers/search.php" method="post">
	<label>Поиск информации о владельцах</label>
	<input type="text" name="ownerSearch" placeholder="Введите имя модели или имя владельца" required>
	<input type="submit">
</form>

<form action="/controllers/search.php" method="post">
	<label>Поиск информации о штрафах</label>
	<input type="text" name="searchFines" placeholder="Введите информацию по штрафу" required>
	<input type="submit">
</form>

<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';
?>