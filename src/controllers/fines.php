<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/fine_model.php';
	
	$fine = new Fine();
	if ($_SERVER['HTTP_REFERER'] == 'http://localhost/views/facts_view.php') {
		$userId = $fine->getUserId($_GET['userName']);
		$ownerId = $fine->getOwnerId($_GET['carReg']);
	}
	
	$fine->output('a', 'asc');
	echo '<hr>';
	$fine->output('o', '');
	
	if (isset($_POST['cameraId']) and isset($_POST['userId']) and isset($_POST['dt']) and isset($_POST['ownerId'])) {
		$fine->addFine($_POST['cameraId'], $_POST['userId'], $_POST['dt'], $_POST['ownerId']);
	} elseif (isset($_POST['deleteFine'])) {
		$fine->deleteFine();
	}