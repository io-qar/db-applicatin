<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/cameras_model.php';
	
	$camera = new Camera();
	$camera->output('a');

	echo '<hr>';
	$camera->output('o');
	if (isset($_POST['newCamAddr']) and isset($_POST['newCamSetting'])) {
		$camera->addCam($_POST['newCamAddr'], $_POST['newCamSetting']);
	}
	if (isset($_POST['newAddr'])) {
		$camera->changeAddress($_POST['newAddr'], $camera->id);
	} elseif (isset($_POST['newSetting'])) {
		$camera->changeSetting($_POST['newSetting'], $camera->id);
	} elseif (isset($_POST['deleteCamera'])) {
		$camera->deleteCamera();
	}