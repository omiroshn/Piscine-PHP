<?php

Class UnholyFactory {
	private $army = array();

	public function absorb($fighter) {
		if (!isset($fighter->type) || $fighter->type === NULL) {
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		} else if (isset($this->army[$fighter->type])) {
			print("(Factory already absorbed a fighter of type " . $fighter->type . ")" . PHP_EOL);
		} else {
			$this->army[$fighter->type] = $fighter;
			print("(Factory absorbed a fighter of type " . $fighter->type . ")" . PHP_EOL);
		}
	}

	public function fabricate($fighter_name) {
		if (array_key_exists($fighter_name, $this->army)) {
			print("(Factory fabricates a fighter of type " . $fighter_name . ")" . PHP_EOL);
			return $this->army[$fighter_name];
		} else {
			print("(Factory hasn't absorbed any fighter of type " . $fighter_name . ")" . PHP_EOL);
			return NULL;
		}
	}
}