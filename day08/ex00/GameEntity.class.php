<?php

require_once('Spaceship.class.php');

Class GameEntity {

	public $ships;

	public $ship = 0;

	public function __construct() {
		$this->ships = array(new Spaceship(0, 0), new Spaceship(700, 0));
	}

	public function switchShip() {
		if ($this->ship === 0) {
			$this->ship = 1;
		} else {
			$this->ship = 0;
		}
	}
}

if (!isset($_SESSION['game'])) {
    $game = new GameEntity();
    $_SESSION['game'] = serialize($game);
} else {
    $game = unserialize($_SESSION['game']);
}
