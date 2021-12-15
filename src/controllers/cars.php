<?php
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/car_model.php';
	
	$car = new Car();
	$car->output('a');

	echo '<hr>';
	$car->output('o');
	if (isset($_POST['newReg'])) {
		$car->changeReg($_POST['newReg']);
	} elseif (isset($_POST['newSetting'])) {
		$car->changeSetting($_POST['newSetting'], $car->setting);
	}