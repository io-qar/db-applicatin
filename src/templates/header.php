<html>
	<head>
		<title><?php echo $title_name; ?></title>
		<link rel="stylesheet" href="/styles/main.css">
		<script src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
		<meta charset="utf-8">
		<?php
			session_start();
			function sort_link_th($title, $a, $b) {
				$sort = @$_GET['sort'];
			
				if ($sort == $a) {
					return '<a class="active" href="?sort='.$b.'">'.$title.' 🔼</a>';
				} elseif ($sort == $b) {
					return '<a class="active" href="?sort='.$a.'">'.$title.' 🔽</a>';
				} else {
					return '<a href="?sort='.$a.'">'.$title.'</a>';
				}
			}
		?>
	</head>
	<body>
		<header class="header">
			<div class="header__content">
				<nav class="navbar">
					<div style="height: 30px; background: url(https://uguide.ru/js/script/girlianda_uguide_ru_1.gif) repeat-x 100%;"></div>
					<?php
						echo '<a href="/views/index.php" class="nav__item">Главная</a>';
						if (isset($_SESSION['name'])) {
							echo '<a href="/views/view_archive.php" class="nav__item">Архив</a>';
							echo '<a href="/controllers/logout.php" class="nav__item">Выйти из аккаунта</a>';
							echo 'Вы зашли на сайт под именем '.$_SESSION["name"].' с типом доступа <b>'.$_SESSION['prv'].'</b>';
						} else {
							echo '<a href="/views/view_reg.php" class="nav__item">Зарегистрироваться</a>';
							echo '<a href="/views/view_login.php" class="nav__item">Войти</a>';
						}
					?>
				</nav>
			</div>
		</header>