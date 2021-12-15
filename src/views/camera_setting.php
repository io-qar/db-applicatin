<?php
	$title_name = 'Настройки камеры';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/cameras.php';

	// echo '<hr>';
	// $camera->output('o');
?>
<h2>Сменить адрес камеры</h2>
<form action="" method="post">
	<label>Новый адрес:</label>
	<input name="newAddr" type="text" required>
	<button type="submit">Сменить адрес</button>
</form>
<?php
	// if (isset($_POST['newAddr'])) {
	// 	$camera->changeAddress($_POST['newAddr'], $camera->id);
	// }
	
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';