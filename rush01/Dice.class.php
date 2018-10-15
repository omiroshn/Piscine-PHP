<?php

Class Dice {

	use Singleton;

	private $faces = 6;
	private $dice;

	public function __construct() {
		$this->rollDice();
	}
	public function rollDice() {
		$this->dice = rand(1, $this->faces);
	}
	public function getDice() {
		return $this->dice;
	}
	
}