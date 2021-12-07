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
		exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
	}
	$name = stripslashes($name);
	$name = htmlspecialchars($name);
	$password = stripslashes($password);
	$password = htmlspecialchars($password);
	
	$name = trim($name);
	$password = trim($password);
	
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	$result = $mysqli->query("SELECT * FROM Db_users WHERE name = '$name'");
	$myrow = $result->fetch_array();
	if (empty($myrow['password'])) {
		exit ("Извините, введённый вами name или пароль неверный.");
	} else {
		
		if ($myrow['password'] == $password) {
			$_SESSION['name'] = $myrow['name']; 
			$_SESSION['userId'] = $myrow['userId'];
			echo "Вы успешно вошли на сайт как ".$_SESSION['name']." и будете перенаправлены на главную через 3 секунд!";
			header('Refresh: 3; url="../index.php"');
		} else {
			exit ("Извините, введённые вами имя или пароль неверные.");
		}
	}
?>