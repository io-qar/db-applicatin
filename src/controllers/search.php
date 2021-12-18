<?php
	$title_name = 'Результаты поиска';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/search_model.php';

	$search = new Search();
	// rowsCount = $search->getMaxCams();

	if (isset($_POST['carSearch'])) {
		$sql_output = $search->carSearch($_POST['carSearch']);
		$search->output($sql_output, 'car');
	}

	if (isset($_POST['regStart'])) {
		$sql_output = $search->regStart($_POST['regStart']);
		$search->output($sql_output, 'car');
	}
	
	if (isset($_POST['minId']) and isset($_POST['maxId'])) {
		if (isset($_POST['address'])) {
			$sql_output = $search->searchCameraId($_POST['minId'], $_POST['maxId'], $_POST['address']);
			$search->output($sql_output, 'cam');
		}
	}

	if (isset($_POST['minId1']) and isset($_POST['maxId1'])) {
		if (isset($_POST['settingList'])) {
			echo $_POST['settingList'];
			$setting = (string)$_POST['settingList'];
			$sql_output = $search->searchCameraId($_POST['minId1'], $_POST['maxId1'], $setting);
			$search->output($sql_output, 'cam');
		}
	}
	if (isset($_POST['ownerIdMin']) and isset($_POST['ownerIdMax']) and isset($_POST['ownerName'])) {
		$sql_output = $search->ownerSearch($_POST['ownerIdMin'], $_POST['ownerIdMax'], $_POST['ownerName']);
		$search->output($sql_output, 'own');

	}
	
	if (isset($_POST['status']) and (isset($_POST['cameraId']) or isset($_POST['regPlate']))) {
		if (isset($_POST['cameraId'])) {
			$camId = (int)$_POST['cameraId'];
			// echo gettype($camId);
			$sql_output = $search->factSearch($_POST['status'], $camId);
		} elseif (isset($_POST['regPlate'])) {
			$regPlate = (string)$_POST['regPlate'];
			// (string)$_POST['regPlate'];
			$sql_output = $search->factSearch($_POST['status'], $regPlate);
		}
		// echo $sql_output;
		$search->output($sql_output, 'fc');
	}

	if (isset($_POST['fineId1']) and isset($_POST['fineId2']) and isset($_POST['dtfilter']) and isset($_POST['datetime']) and isset($_POST['fineCameraId'])) {
		$sql_output = $search->fineSearch($_POST['fineId1'], $_POST['fineId2'], $_POST['dtfilter'], $_POST['datetime'], $_POST['fineCameraId']);
		$search->output($sql_output, 'fn');
	}
?>