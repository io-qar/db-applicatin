<?php
	$title_name = 'Поиск';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	
?>
<h2>Архив и поиск по базе данных</h2>
<form action="/controllers/search.php" method="post">
    <label>Поиск</label>
	<input list="tablesList" type="text" name="table" placeholder="Выберите параметр поиска" required>
	<datalist id="tablesList">
		<option value="По камерам"/>
		<option value="По фактам"/>
		<option value="По машинам"/>
		<option value="По владельцам"/>
		<option value="По штрафам"/>
	</datalist>
	<input type="text" name="search" placeholder="Введите параметр" required>
	<input type="submit" name="submit" value="Найти">
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';
?>