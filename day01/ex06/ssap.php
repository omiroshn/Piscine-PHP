#!/usr/bin/php
<?php
	if ($argc >= 2) {
		$list = array();
		for ($i = 1; $i < $argc; $i++) {
			$str = ft_split($argv[$i]);
			for ($j = 0; $j < count($str); $j++) {
				array_push($list, $str[$j]);
			}
		}
		sort($list);
		for ($i = 0; $i < count($list); $i++) {
			if ($list[$i] != "") {
				echo "$list[$i]\n";
			}
		}
	} else {
		echo "no argc\n";
	}

	function ft_split($string) {
		if ($string) {
			$string = trim($string);
			while (strstr($string, "  ")) {
				$string = str_ireplace("  ", " ", $string);
			}
			$line = explode(" ", $string);
			$data = array();
			foreach ($line as $value) {
				array_push($data, $value);
			}
			return $data;
		}
	}
?>