<?php
	$title_name = 'Главная';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';

	// $result = $mysqli->query("SELECT * FROM Cameras");
	// $users = $result->fetch_all(MYSQLI_ASSOC);
	// foreach ($users as $user) {
	// 	echo json_encode($user);
	// }

	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';