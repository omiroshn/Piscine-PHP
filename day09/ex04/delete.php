<?php
	if (array_key_exists("id", $_REQUEST)) {
		$todos = explode("\n", file_get_contents("list.csv"));

		foreach ($todos as $key => $todo) {
			if (explode(";", $todo)[0] === $_REQUEST["id"]) {
				array_splice($todos, $key, 1);
			}
		}
		file_put_contents("list.csv", implode("\n", $todos));
	}