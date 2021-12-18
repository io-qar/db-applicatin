<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/file_model.php';
	
	$file = new File();
	$file->output('a', 'asc');

	echo '<hr>';
	$file->output('o');
	
	if (isset($_POST['addFile'])) {
		$file->addFile($_POST['addFile']);
	} elseif (isset($_POST['newLink'])) {
		$file->changeLink($_POST['newLink']);
	} elseif (isset($_POST['deleteFile'])) {
		$file->deleteFile();
	}