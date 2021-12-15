<?php
	$title_name = 'Главная';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';

	echo '<h1>Добро пожаловать в систему учёта штрафов!</h1><br><h2>Войдите или зарегистрируйтесь, чтобы получить доступ к функциям учёта!</h2>';
	if (isset($_SESSION['prv']) and $_SESSION['prv'] == 'admin') {
		echo "
			<h3>Вам доступны функции админа!</h3>
			<p>Камеры</p>
			<ul>
				<li><a href='/views/cameras_view.php'>Полный список камер</a></li>
			</ul>

			<p>Транспортные средства</p>
			<ul>
				<li><a href='/views/cars_view.php'>Полный список ТС</a></li>
			</ul>

			<p>Владелььцы транспортных средств</p>
			<ul>
				<li><a href=''>Полный список владельцев ТС</a></li>
			</ul>

			<p>Штрафы</p>
			<ul>
				<li><a href=''>Полный список штрафов</a></li>
			</ul>

			<p>Факты нарушений</p>
			<ul>
				<li><a href=''>Полный список фактов</a></li>
			</ul>

			<p>Пользователи</p>
			<ul>
				<li><a href=''>Полный список пользователи</a></li>
			</ul>
		";
	} else {
		echo "<h3>Фиксации нарушений:</h3>";
		include $_SERVER['DOCUMENT_ROOT'].'/views/facts_view.php';
	}

	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';