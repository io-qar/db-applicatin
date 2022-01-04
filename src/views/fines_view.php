<?php
	$title_name = 'Штрафы';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/fines.php';

	if ($_SESSION['prv'] == 'admin'):
?>
		<hr class="dashed">
		<p>Введите информацию о штрафе:</p>
		<form action="" method="post">
			<label>Номер камеры: </label>
			<input name="cameraId" type="text" value="<?php echo $_GET['cameraId']; ?>" readonly>
			<label>Номер пользователя: </label>
			<input name="userId" type="text" value="<?php echo $userId; ?>" readonly>
			<label>Время выписки: </label>
			<input name="dt" type="text" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
			<label>Номер владельца: </label>
			<input name="ownerId" type="text" value="<?php echo $ownerId; ?>" readonly>
			<button type="submit">Выписать штраф</button>
		</form>
<?php
	endif;
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';