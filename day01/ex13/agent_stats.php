#!/usr/bin/php
<?php

	if ($argc != 2) {
		exit(0);
	}
	$handle = fopen('php://stdin', 'r');
	if (!$handle) {
		echo "Error in opening stdin.";
		exit(0);
	}
	$line = array();
	$user = array();
	fgets($handle);
	while (($buffer = fgets($handle, 4096)) !== false) {
		$tmp = explode(";", $buffer);
		if (count($tmp) == 4) {
			$name = $tmp[0];
			$line[] = $tmp;
			if (!array_key_exists($name, $user)) {
				$user[$name]['total'] = 0;
				$user[$name]['count'] = 0;
				$user[$name]['moulinette'] = 0;
			}
		}
	}
	ksort($user);
	if ($argv[1] == "average") {
		$total = 0;
		$count = 0;
		foreach ($line as $l) {
			if ($l[1] != '' && $l[2] != "moulinette") {
				$total += $l[1];
				$count++;
			}
		}
		echo $total/$count."\n";
	} else if ($argv[1] == "average_user" || $argv[1] == "moulinette_variance") {
		foreach ($line as $l) {
			if ($l[1] != '' && $l[2] != "moulinette") {
				$name = $l[0];
				$user[$name]['total'] += $l[1];
				$user[$name]['count'] += 1;
			} else if ($l[2] == "moulinette") {
				$user[$l[0]]['moulinette'] = $l[1];
			}
		}

		if ($argv[1] == "average_user") {
			foreach ($user as $u => $v) {
				echo $u.":".$v['total']/$v['count']."\n";
			}
		} else if ($argv[1] == "moulinette_variance") {
			foreach ($user as $u => $v) {
				echo $u.":".(($v['total']/$v['count'])-$v['moulinette'])."\n";
			}
		}
	}
	fclose($handle)
?>