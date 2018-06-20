#!/usr/bin/php
<?php
	if ($argc > 1) {
		$list = explode(" ", $argv[1]);
		$first = $list[0];
		for ($i=1; $i < count($list); $i++) { 
			$list[$i-1] = $list[$i];
		}
		$list[$i-1] = $first;
		for ($i=0; $i < count($list); $i++) { 
			echo "$list[$i]";
			if ($i < count($list) - 1)
				echo " ";
		}
		echo "\n";
	}
?>