<?php 
	$title_name = 'Регистрация';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
?>
<h2>Регистрация</h2>
<form action="/controllers/reg.php" method="post">
	<p>
		<label>Ваш логин:<br></label>
		<input name="name" type="text" size="50" maxlength="50" required>
	</p>
	<p>
		<label>Ваш пароль:<br></label>
		<input name="password" type="password" size="50" maxlength="50" required>
	</p>
	<p>
		<input name="admin" type="checkbox" value="admin">
		<label>Cуперадмин<br></label>

		<input type="submit" name="submit" value="Зарегистрироваться">
	</p>
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';
?>