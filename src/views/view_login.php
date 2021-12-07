<?php
	$title_name = 'Логин';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>
<h2>Вход</h2>
<form action="/controllers/login.php" method="post">
	<p>
		<label>Ваш логин:<br></label>
		<input name="name" type="text" size="50" maxlength="50" required>
	</p>
	<p>
		<label>Ваш пароль:<br></label>
		<input name="password" type="password" size="50" maxlength="50" required>
	</p>
	<p>
		<input type="submit" name="submit" value="Войти">
	</p>
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';
?>