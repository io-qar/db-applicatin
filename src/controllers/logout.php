<?php
	session_start();
	unset($_SESSION['name']);
	session_destroy();
	echo 'Вы вышли из аккаунта и будете перенаправлены на главную через 3 секунды!';
	header('Refresh: 3; url="../index.php"');