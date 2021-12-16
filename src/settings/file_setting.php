<?php
	$title_name = 'Настройки файла';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/files.php';
?>
<hr class="dashed">
<p>Сменить ссылку</p>
<form action="" method="post">
	<label>Новая ссылка:</label>
	<input name="newLink" type="text" required>
	<button type="submit">Сменить ссылку</button>
</form>
<hr class="dashed">
<p>Удалить файл</p>
<form action="" method="post">
	<button type="submit" name="deleteFile">Удалить файл</button>
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';