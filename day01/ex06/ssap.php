#!/usr/bin/php
<?php
	function ft_split($string) {
		if ($string) {
			$line = explode(" ", $string);
			$data = array();
			foreach ($line as $value) {
				if ($value != "") {
					array_push($data, $value);
				}
			}
			return $data;
		}
		else {
			echo "no args\n";
		}
	}

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
			echo "$list[$i]\n";
		}
	}
?>