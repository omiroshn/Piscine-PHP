#!/usr/bin/php
<?php
	if ($argc == 2) {
		$line = $argv[1];
		$line = trim($line);
		for ($i = 0; $i < strlen($line); $i++) {
			while ($line[$i] == " ")
				$i++;
			if ($line[$i - 1] == " ")
				echo " ";
			echo $line[$i];
		}
		echo "\n";
	}
?>