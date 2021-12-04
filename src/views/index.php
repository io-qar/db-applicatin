<?php
	$mysqli = new mysqli('172.18.0.1:3307', 'root', 'root', 'cameraproject');
	if ($mysqli->connect_error) {
		die('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);
	}
	$result = $mysqli->query("SELECT * FROM camera");
	$users = $result->fetch_all(MYSQLI_ASSOC);
	foreach ($users as $user) {
		echo json_encode($user);
	}