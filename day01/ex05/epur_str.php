#!/usr/bin/php
<?php
	if ($argc == 2) {
		$str = trim($argv[1]);
		while (strstr($str, "  ")) {
			$str = str_ireplace("  ", " ", $str);
		}
		echo $str . "\n";
	}
?>