#!/usr/bin/php
<?php
	if ($argc != 3 || !file_exists($argv[1]))
		exit(0);
	$fd = fopen($argv[1], 'r');
	$arr = array();
	while (true) {
		$line = fgetcsv($fd, 0, ';');
		if ($line == NULL) {
			break;
		}
		array_push($arr, $line);
	}
	$key_number = array_search($argv[2], $arr[0]);
	if ($key_number === FALSE)
		exit(0);
	for ($i = 1; $i < count($arr); $i++) {
		$key = $arr[$i][$key_number];
		$name[$key] = $arr[$i][0];
		$surname[$key] = $arr[$i][1];
		$mail[$key] = $arr[$i][2];
		$IP[$key] = $arr[$i][3];
		$pseudo[$key] = $arr[$i][4];
	}
	while (true) {
		echo "Enter your command: ";
		$command = fgets(STDIN);
		if ($command == null) {
			echo "\n";
			break ;
		}
		try {
			eval($command);
		} catch (ParseError $error) {
			echo "PHP Parse error: syntax error, unexpected T_STRING in [....]\n";
		}
	}
?>