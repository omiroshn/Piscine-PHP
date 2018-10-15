<?php

Class GameEntity {

	public $ships = array();
	public $dice;
	private $countShip = 0;
	private $currentShip = 0;

	public function __construct() {
		$factory = new Factory();
		$shipA = $factory->create('A', 50, 50, 0);
		$shipB = $factory->create('B', 1600, 50, 1);
		$shipC = $factory->create('C', 50, 1000, 0);
		$shipD = $factory->create('D', 1600, 1000, 1);
		array_push($this->ships, $shipA);
		array_push($this->ships, $shipB);
		array_push($this->ships, $shipC);
		array_push($this->ships, $shipD);
		foreach ($this->ships as $key) {
			$this->countShip++;
		}
		$this->dice = new Dice();
	}

	public function get_current_ship() {return $this->currentShip;}

	public function switchShip() {
		$this->currentShip++;
		if ($this->currentShip >= $this->countShip)
			$this->currentShip = 0;
	}

}