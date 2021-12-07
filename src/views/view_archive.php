<?php 
	$title_name = 'Регистрация';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
?>
<h2>Архив и поиск по базе данных</h2>
<!-- <p>По чему вести посик?</p> -->
<form action="/controllers/search.php" method="post">
    <label>Поиск</label>
	<input type="text" name="search" placeholder="Поиск по сайту" required>
	<input type="submit" name="submit" value="Найти">
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/search.php';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';
?>