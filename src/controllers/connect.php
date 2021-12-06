<?php
	$mysqli = new mysqli('db', 'user', 'password', 'cameraproject');
	if ($mysqli->connect_error) {
		die('Connect Error ('.$mysqli->connect_errno.') '.$mysqli->connect_error);
	}