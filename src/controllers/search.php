<?php
	$inputSearch = $_POST['search'];
	include $_SERVER['DOCUMENT_ROOT'].'/controllers/connect.php';
	$sql = "SELECT * FROM Db_users WHERE name = '$inputSearch' or userId = '$inputSearch'";
	$result = $mysqli->query($sql);

	function countPeople($result) { 
		foreach ($result as $row) {
			echo "ID: ".$row['userId']."<br>";
			echo "Имя: ".$row['name']."<br>";
		}
	}

	countPeople($result);
?>