<?php
	$title_name = 'Настройки владельца';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/owners.php';
?>
<hr class="dashed">
<p>Сменить номер паспорта</p>
<form action="" method="post">
	<label>Новый номер:</label>
	<input name="newId" type="text" placeholder="Номер" required>
	<button type="submit">Сменить номер</button>
</form>
<hr class="dashed">
<p>Сменить имя владельца</p>
<form action="" method="post">
	<label>Новое имя:</label>
	<input name="newName" type="text" placeholder="Иван Иванович" required>
	<button type="submit">Сменить имя</button>
</form>
<hr class="dashed">
<p>Сменить номер авто</p>
<form action="" method="post">
	<label>Присваемый номер ТС:</label>
	<input name="newReg" type="text" placeholder="Иван Иванович" required>
	<button type="submit">Сменить имя</button>
</form>
<hr class="dashed">
<p>Удалить владельца</p>
<form action="" method="post">
	<button type="submit" name="deleteOwner">Удалить владельца</button>
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';