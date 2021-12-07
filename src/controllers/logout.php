<?php
	session_start();
	unset($_SESSION['name']);
	session_destroy();
	echo 'Вы вышли из аккаунта и будете перенаправлены на главную через 5 секунд!';
	header('Refresh: 5; url="../index.php"');