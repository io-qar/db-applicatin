<html>
	<head>
		<title><?php echo $title_name; ?></title>
		<link rel="stylesheet" href="/styles/main.css">
		<?php
			session_start();
		?>
		</head>
		<body>
			<header class="header">
				<div class="header__content">
					<nav class="navbar">
						<?php
							if (isset($_SESSION['name'])) {
								echo '<a href="/view/index.php" class="nav__item">Главная</a>';
								// echo '<a href="/view/view_user-page.php" class="nav__item">Ваш профиль</a>';
								// echo '<a href="/view/view_upload.php" class="nav__item">Загрузить пост</a>';
								// echo '<a href="/protected/logout.php" class="nav__item">Выйти из аккаунта</a>';
								echo 'Вы зашли на сайт под именем '.$_SESSION["name"];
							} else {
								// echo '<a href="/view/view_reg.php" class="nav__item">Зарегистрироваться</a>';
								// echo '<a href="/view/view_login.php" class="nav__item">Войти</a>';
							}
						?>
					</nav>
				</div>
			</header>