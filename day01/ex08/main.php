#!/usr/bin/php
<?php
	include("ft_is_sort.php");

	{
		$tab = array("zZzZzZz", "!/@#;^", "42", "hi", "Hello World");
		if (ft_is_sort($tab))
			echo "The array is sorted\n";
		else
			echo "The array is not sorted\n";
	}
	{
		$tab = array("3", "35h45", "53", "124", "3v", "42g35g", "568", "634", "1251", "6547", "AAA", "Hello", "World", "f23", "f4f", "f5", "g", "h64h", "rg35", "rg42t", "rhrht");
		if (ft_is_sort($tab))
			echo "The array is sorted\n";
		else
			echo "The array is not sorted\n";
	}
?>
