<?php
	$title_name = 'Результаты поиска';
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	include $_SERVER['DOCUMENT_ROOT'].'/templates/header.php';
	include $_SERVER['DOCUMENT_ROOT'].'/models/search_model.php';

	$search = new Search();

	if (isset($_POST['carSearch'])) {
		$inputSearch = $_POST['carSearch'];
		$sql_output = $search->carSearch($inputSearch);
	} elseif (isset($_POST['cameraSearch'])) {
		$inputSearch = $_POST['cameraSearch'];
		$sql_output = $search->cameraSearch($inputSearch);
	// elseif (isset($_POST['search']) and isset($_POST['table'])) {
	// 	$inputSearch = $_POST['search'];
	// 	$inputTable = $_POST['table'];

	// 	$tbl = match($inputTable) {
	// 		'По камерам' => 'Cameras',
	// 		'По фактам' => 'Facts',
	// 		'По машинам' => 'Cars',
	// 		'По владельцам' => 'Vehicle_owners',
	// 		'По штрафам' => 'Fines',
	// 	};
	// 	$sql_output = $search->idSearch($tbl, $inputSearch);
	} elseif (isset($_POST['ownerSearch'])) {
		$inputSearch = $_POST['ownerSearch'];
		$sql_output = $search->ownerSearch($inputSearch);
	} elseif (isset($_POST['searchFines'])) {
		$inputSearch = $_POST['searchFines'];
		$sql_output = $search->fineSearch($inputSearch);
	}

	$search->output($sql_output);
?>