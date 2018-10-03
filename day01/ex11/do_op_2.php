#!/usr/bin/php
<?php
	function get_error($msg) {
		echo $msg;
		exit(1);
	}

	if ($argc == 2) {
		$expr = str_replace(" ", "", $argv[1]);
		$first = intval($expr);
		$sign = substr(substr($expr, strlen((string)$first)), 0, 1);
		$second = substr(substr($expr, strlen((string)$first)), 1);
		if (!is_numeric($first) || !is_numeric($second)) {
			get_error("Syntax Error\n");
		}
		if (!strcmp("+", $sign)) {
			echo $first + $second . "\n";
		}
		else if (!strcmp("-", $sign)) {
			echo $first - $second . "\n";
		}
		else if (!strcmp("*", $sign)) {
			echo $first * $second . "\n";
		}
		else if (!strcmp("/", $sign)) {
			if ($second == "0") {
				get_error("DivizionByZeroError\n");
			}
			echo $first / $second . "\n";
		}
		else if (!strcmp("%", $sign)) {
			if ($second == "0") {
				get_error("ModuloByZeroError\n");
			}
			echo $first % $second . "\n";
		} else {
			get_error("Syntax Error\n");
		}
	}
	else {
		echo "Incorrect Parameters\n";
	}
?>