<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/fact_model.php';
	
	$fact = new Fact();
	$fact->output('a');

	echo '<hr>';
	$fact->output('o');
	
	if (isset($_POST['addFactCam']) and isset($_POST['addFactCarReg']) and isset($_POST['addFactFile'])) {
		$fact->addFact($_POST['addFactCam'], $_POST['addFactCarReg'], $_POST['addFactFile']);
	} elseif (isset($_POST['newCamId'])) {
		$fact->changeCamId($_POST['newCamId']);
	} elseif (isset($_POST['newReg'])) {
		$fact->changeReg($_POST['newReg']);
	} elseif (isset($_POST['newStatus'])) {
		$fact->changeStatus($_POST['newStatus']);
	} elseif (isset($_POST['deleteFact'])) {
		$fact->deleteFact();
	}