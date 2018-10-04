#!/usr/bin/php
<?php
	if ($argc == 2) {
		$ch = curl_init($argv[1]);
		$dir = parse_url($argv[1], PHP_URL_HOST);
		if (file_exists($dir)) {
			$dd = opendir($dir);
			while (FALSE !== ($file = readdir($dd))) {
				if ($file != "." && $file != "..")
					unlink($dir . "/" . $file);
			}
			closedir($dd);
			rmdir($dir);
		}
		mkdir($dir);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$link = file_get_contents($argv[1]);
		preg_match_all('#img.*src\s*=\s*\"([^\"]*\/([^\"]*))\"#im', $link, $images);
		for ($i = 0; $i < count($images[1]); $i++) { 
			$ch = curl_init($images[1][$i]);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$content = curl_exec($ch);
			file_put_contents($dir . "/" . $images[2][$i], $content);
		}
		curl_close($ch);
	}
?>