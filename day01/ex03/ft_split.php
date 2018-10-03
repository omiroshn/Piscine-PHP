<?php
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
			sort($data);
			return $data;
		}
		else {
			echo "no args\n";
		}
	}
?>