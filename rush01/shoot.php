<?php

require_once("Singleton.trait.php");
require_once("Ship.class.php");
require_once("Dice.class.php");
require_once("GameEntity.class.php");

	session_start();
	$game = unserialize($_SESSION["game"]);


	$number = $game->get_current_ship();
	$ship = $game->ships[$number];
	$range = $ship->get_weapon()->get_shortRange();
	$direction = $ship->get_direction();
	$range = explode('-', $range);
	
	$answer = array(
		'left' => $ship->get_left(),
		'top' => $ship->get_top(),
		'distance' => $range,
		'direction' => $direction,
	);
	echo json_encode($answer);
	$_SESSION['game'] = serialize($game);
?>