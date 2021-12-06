<?php
	$mysqli = new mysqli('db', 'user', 'password', 'cameraproject');
	if ($mysqli->connect_error) {
		die('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);
	}
	echo 'success';
	$result = $mysqli->query("SELECT * FROM Cameras");
	$users = $result->fetch_all(MYSQLI_ASSOC);
	foreach ($users as $user) {
		echo json_encode($user);
	}