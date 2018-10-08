<?php
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = 'qwerty12345';
	$db_database = 'shop';

	$con = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>