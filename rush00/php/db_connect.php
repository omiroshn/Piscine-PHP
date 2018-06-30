<?php
	$db_host = 'localhost:3306';
	$db_user = 'root2';
	$db_pass = '123456';
	$db_database = 'rush00';

	$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>