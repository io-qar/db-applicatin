<?php
	$title_name = 'Факты';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/facts.php';

	if ($_SESSION['prv'] == 'admin'): ?>
		<hr class="dashed">
		<form action="" method="post">
			<label>Номер камеры, номер ТС, доказательство нарушения:</label>
			<input name="addFactCam" placeholder="Номер" required>
			<input name="addFactCarReg" type="text" maxsize="11" placeholder="Номер" pattern="[A-Z0-9]{6,7} [A-Z0-9]{2,3}" required>
			<input name="addFactFile" type="text" required>
			<button type="submit">Добавить факт</button>
		</form>
<?php
	endif;
	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';