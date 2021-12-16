<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/car_model.php';
	
	$car = new Car();
	$car->output('a');

	echo '<hr>';
	$car->output('o');
	if (isset($_POST['newCarReg']) and isset($_POST['newCarModel'])) {
		$car->addCar($_POST['newCarReg'], $_POST['newCarModel']);
	}
	if (isset($_POST['newReg'])) {
		$car->changeReg($_POST['newReg']);
	} elseif (isset($_POST['newModel'])) {
		$car->changeModel($_POST['newModel'], $car->reg);
	} elseif (isset($_POST['deleteCar'])) {
		$car->deleteCar();
	}