<?php
	$title_name = 'Главная';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';

	echo '<h1>Добро пожаловать в систему учёта штрафов!</h1><br><h2>Войдите или зарегистрируйтесь, чтобы получить доступ к функциям учёта!</h2>';
	if (isset($_SESSION['prv'])) {
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

			<p>Владельцы транспортных средств</p>
			<ul>
				<li><a href='/views/owners_view.php'>Полный список владельцев ТС</a></li>
			</ul>

			<p>Факты нарушений</p>
			<ul>
				<li><a href='/views/facts_view.php'>Полный список фактов</a></li>
			</ul>

			<p>Штрафы</p>
			<ul>
				<li><a href='/views/fines_view.php'>Полный список штрафов</a></li>
			</ul>

			<p>Файлы</p>
			<ul>
				<li><a href='/views/files_view.php'>Полный список файлов</a></li>
			</ul>
		";
	}
	

	include $_SERVER['DOCUMENT_ROOT'].'/templates/footer.php';