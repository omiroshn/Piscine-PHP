#!/usr/bin/php
<?php
	if ($argc == 2) {
		$expr = str_replace(" ", "", $argv[1]);
		$first = intval($expr);
		$sign = substr(substr($expr, strlen((string)$first)), 0, 1);
		$second = substr(substr($expr, strlen((string)$first)), 1);
		if (!is_numeric($first) || !is_numeric($second)) {
			echo "Syntax Error\n";
			exit ();
		}
		if (!strcmp("+", $sign)) {
			echo $first + $second . "\n";
		} else if (!strcmp("-", $sign)) {
			echo $first - $second . "\n";
		} else if (!strcmp("*", $sign)) {
			echo $first * $second . "\n";
		} else if (!strcmp("/", $sign)) {
			if ($second == "0") {
				echo "Division by zero\n";
				exit (1);
			}
			echo $first / $second . "\n";
		} else if (!strcmp("%", $sign)) {
			echo $first % $second . "\n";
		} else {
			echo "Syntax Error\n";
			exit ();
		}
	} else {
		echo "Incorrect Parameters\n";
	}
?>