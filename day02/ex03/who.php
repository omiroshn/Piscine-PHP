#!/usr/bin/php
<?php
	date_default_timezone_set("Europe/Kiev");
	if ($fh = fopen('/var/run/utmpx', 'rb')) {
		fseek($fh, 1256);
		while (!feof($fh)) {
			$line = fread($fh, 628);
			if (strlen($line) == 628) {
				$line = unpack("a256user/a4id/a32line/ipid/itype/itermination/iend", $line);
				if ($line['type'] == 7) {
					$date = date("M  j H:i", $line['termination']);
					$user = trim($line['user']);
					$line2 = trim($line['line']);
					printf("%-9s%-9s%-9s \n", $user, $line2, $date);
				}
			}
		}
		fclose($fh);
	}
?>