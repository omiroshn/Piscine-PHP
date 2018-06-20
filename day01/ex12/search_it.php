#!/usr/bin/php
<?php
	if ($argc > 2) {
		$searched = $argv[1];
		for ($i = 2; $i < $argc; $i++) {
			$pos = strpos($argv[$i], ":");
			if ($pos) {
				$key = substr($argv[$i], 0, $pos);
				$value = substr($argv[$i], $pos + 1);
				$storage[$key] = $value;
			}
		}
		if ($storage[$searched]) {
			echo $storage[$searched]."\n";
		}
	}
?>