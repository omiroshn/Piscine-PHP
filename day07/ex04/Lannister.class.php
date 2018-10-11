<?php

Class Lannister {
	public function sleepWith($person) {
		$name = get_class($person);
		if (!array_key_exists($name, $this->relation)) {
			echo "Not even if I'm drunk !\n";
		} else {
			echo $this->relation[$name] . "\n";
		}
	}
}