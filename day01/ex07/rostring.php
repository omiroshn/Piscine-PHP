#!/usr/bin/php
<?php
	if ($argc >= 2) {
		$list = ft_split($argv[1]);
		$first = $list[0];
		for ($i = 1; $i < count($list); $i++) { 
			$list[$i - 1] = $list[$i];
		}
		$list[$i - 1] = $first;
		for ($i = 0; $i < count($list); $i++) { 
			echo "$list[$i]";
			if ($i < count($list) - 1)
				echo " ";
		}
		echo "\n";
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