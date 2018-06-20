#!/usr/bin/php
<?php
	while (true) {
		echo "Enter a number: ";
		$line = fgets(STDIN);
		if (!is_string($line) && !is_numeric($line))
			exit("\n");
		$line = trim($line);
		if (!is_numeric($line))
			echo "'" . $line . "' is not a number";
		else {
			if ($line % 2)
				echo "The number $line is odd";
			else
				echo "The number $line is even";
		}
		echo "\n";
	}
?>

