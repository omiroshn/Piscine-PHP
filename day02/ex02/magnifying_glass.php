#!/usr/bin/php
<?php
	if ($argc == 2) {
		$str = file_get_contents($argv[1]);

		$str = preg_replace_callback('#<[Aa][^>]*>(.*?)<\/[Aa]>#s', 
			function($matches) {

				$str1 = preg_replace_callback('#>(.*?)<#s', 
						function($matches) {
							
							// return preg_replace_callback('#(.+?)#', 
							// 		function($matches) {
							// 			return strtoupper($matches[1]);
							// 		}, $matches[0]);
							return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
						}, $matches[0]);


				$str2 = preg_replace_callback('#title="(.+?)"#', 
						function($matches) {
							// return preg_replace_callback('#"(.+?)"#', 
							// 		function($matches) {
							// 			return strtoupper($matches[0]);
							// 		}, $matches[0]);
							return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
						}, $str1);

				return $str2;
			}, $str);
		echo $str;
	}
?>