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
?>