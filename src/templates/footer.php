		<script src="/scripts/jSnow.js"></script>
		<script>
			$(document).ready(function() {
				$("body").jSnow({
					vSize: 1000, // Размер области
					flakes: 50, // Количество снежинок
					flakeColor: ["#7beee0"], // Цвет
					flakeMinSize: 10, // Минимальный размер снежинки
					flakeMaxSize: 20, // Максимальный размер снежинки
					fallingSpeedMin: 1, // Минимальная скорость снежинки
					fallingSpeedMax: 2, // Максимальная скорость снежинки
					flakeCode:["❄"] // Вид снежинки
				});
			});
		</script>
	</body>
</html>