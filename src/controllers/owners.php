<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/owner_model.php';
	
	$owner = new Owner();
	$owner->output('a');

	echo '<hr>';
	$owner->output('o');
	if (isset($_POST['newOwnerId']) and isset($_POST['newOwnerName']) and isset($_POST['newOwnerCar'])) {
		$owner->addOwner($_POST['newOwnerId'], $_POST['newOwnerName'], $_POST['newOwnerCar']);
	}
	if (isset($_POST['newReg'])) {
		$owner->changeCardid($_POST['newId']);
	} elseif (isset($_POST['newName'])) {
		$owner->changeName($_POST['newName'], $owner->cardId);
	} elseif (isset($_POST['newReg'])) {
		// $owner->changeReg()
	}
	elseif (isset($_POST['deleteOwner'])) {
		$owner->deleteOwner();
	}