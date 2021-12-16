<?php
	$title_name = 'Настройки штрафа';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/fines.php';
?>
<hr class="dashed">
<p>Удалить штраф</p>
<form action="" method="post">
	<button type="submit" name="deleteFine">Удалить штраф</button>
</form>
<?php
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';