#!/usr/bin/php
<?php
	if ($argc == 4) {
		$first = trim($argv[1]);
		$sign = trim($argv[2]);
		$second = trim($argv[3]);
		if (!is_numeric($first) || !is_numeric($second)) {
			echo "Wrong arguments";
			exit (1);
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
		}
	} else {
		echo "Incorrect Parameters\n";
	}
?>