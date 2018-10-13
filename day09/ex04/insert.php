<?php
	if (array_key_exists("todo", $_REQUEST) && file_exists("list.csv")) {
		$file_content = file_get_contents("list.csv");

		if ($file_content === "") {
			$id = 0;
		} else {
			$todo_array = explode("\n", $file_content);
			$id = explode(";", $todo_array[count($todo_array) - 2])[0] + 1;
		}
		$content = $id . ";" . $_REQUEST["todo"];

		file_put_contents("list.csv", $content . "\n", FILE_APPEND);
		echo $content;
	}