#!/usr/bin/php
<?php
	while (true) {
		echo "Enter a number: ";
		$line = fgets(STDIN);
		if (!is_string($line) && !is_numeric($line))
			exit("\n");
		$line = trim($line);
		if (!is_numeric($line))
			echo "'\033[32m" . $line . "\033[0m' is not a number";
		else {
			if ($line % 2)
				echo "The number \033[32m$line\033[0m is \033[1;31modd\033[0m";
			else
				echo "The number \033[32m$line\033[0m is \033[1;34meven\033[0m";
		}
		echo "\n";
	}
?>
