<?php
	session_start();
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		if ($name == '') {
			unset($name);
		}
	}
	if (isset($_POST['password'])) {
		$password = $_POST['password'];
		if ($password == '') {
			unset($password);
		}
	}

	if (empty($name) or empty($password)) {
		exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
	}
	
	$name = stripslashes($name);
	$name = htmlspecialchars($name);
	$password = stripslashes($password);
	$password = htmlspecialchars($password);
 	
	$name = trim($name);
	$password = trim($password);
 	
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	$result = $mysqli->query("SELECT userId FROM Db_users WHERE name = '$name'");
	$myrow = $result->fetch_array();

	if (!empty($myrow['userId'])) {
		exit("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
	}
	
	if (isset($_POST['admin'])) {
		$prv = $_POST['admin'];
		$result = $mysqli->query("INSERT INTO Db_users (name, password, user_privilege) VALUES ('$name', '$password', '$prv')");
	} else $result = $mysqli->query("INSERT INTO Db_users (name, password) VALUES ('$name', '$password')");

	if ($result) {
		echo "Вы успешно зарегистрированы! Перенапрвление на главную через 5 секунд";
		header('Refresh: 5; url="../index.php"');
	} else {
		echo "Ошибка! Вы не зарегистрированы.";
	}
?>