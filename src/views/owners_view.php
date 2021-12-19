<?php
	$title_name = 'Владельцы ТС';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/owners.php';
?>
<hr class="dashed">
<?php
	if ($_SESSION['prv'] == 'admin') {
		echo '
			<p>Добавить владельца ТС</p>
			<form action="" method="post">
				<label>Номер паспорта, имя и номер ТС:</label>
				<input name="newOwnerId" type="text" placeholder="Номер паспорта" required>
				<input name="newOwnerName" type="text" maxsize="20" placeholder ="Иван" required>
				<input name="newOwnerCar" type="text"  maxsize="11" required>
				<button type="submit">Добавить владельца</button>
			</form>
		';
	}

	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';