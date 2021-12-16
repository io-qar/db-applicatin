<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/fact_model.php';
	
	$fact = new Fact();
	$fact->output('a');

	echo '<hr>';
	$fact->output('o');
	// $fact->showFact();
	
	if (isset($_POST['addFactCam']) and isset($_POST['addFactCarReg'])) {
		$fact->addFact($_POST['addFactCam'], $_POST['addFactCarReg'], 1);
	}