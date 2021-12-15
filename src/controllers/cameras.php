<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/cameras_model.php';
	
	$camera = new Camera();
	$camera->output('a');

	echo '<hr>';
	$camera->output('o');
	if (isset($_POST['newAddr'])) {
		// $camera->output('o');
		$camera->changeAddress($_POST['newAddr'], $camera->id);
	}