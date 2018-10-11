<?php

Class NightsWatch implements IFighter {
	private $army = array();

	public function fight() {
		foreach ($this->army as $person) {
			if (method_exists($person, "fight")) {
				$person->fight();
			}
		}
	}
	public function recruit($person) {
		array_push($this->army, $person);
	}
}