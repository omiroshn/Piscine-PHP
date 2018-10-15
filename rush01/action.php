<?php
require_once("Singleton.trait.php");
require_once("Ship.class.php");
require_once("Dice.class.php");
require_once("GameEntity.class.php");

	session_start();
	$game = unserialize($_SESSION["game"]);
	if ($_GET["value"] === "DOWN") {
		if ($game->ships[$game->get_current_ship()]->get_top() < 1050) {
			$game->ships[$game->get_current_ship()]->down();
		}
	} else if ($_GET["value"] === "UP") {
		if ($game->ships[$game->get_current_ship()]->get_top() > 0) {
			$game->ships[$game->get_current_ship()]->up();
		}
	} else if ($_GET["value"] === "LEFT") {
		if ($game->ships[$game->get_current_ship()]->get_left() > 0) {
			$game->ships[$game->get_current_ship()]->left();
		}
	} else if ($_GET["value"] === "RIGHT") {
		if ($game->ships[$game->get_current_ship()]->get_left() <= 1890) {
			$game->ships[$game->get_current_ship()]->right();
		}
	} else if ($_GET["value"] === "NEXT TURN") {
		$game->switchShip();
	}
	$_SESSION['game'] = serialize($game);
	// echo json_encode(value)

	// if ($_GET['value'] == 'SHOOT') {
	// 	// $ship = "get current ship";
	// 	// $ship->shoot() // shoot and check if 
	// 	echo json_encode($game);
	// }
	// if ($_GET['value'] == 'SHOOT') {
	// 	session_start();
	// 	$game = $_SESSION['game'];
	// 	// $ship = "get current ship";
	// 	// $ship->shoot() // shoot and check if 
	// 	echo json_encode($game);
	// }

	$number = $game->get_current_ship();
	$ship = $game->ships[$number];
	$name = $ship->get_name();
	$size = $ship->get_size();
	$hp = $ship->get_hp();
	$PP = $ship->get_PP();
	$speed = $ship->get_speed();
	$handling = $ship->get_handling();
	$shield = $ship->get_shield();
	$weaponName = $ship->get_weaponName();
	$weapon = $ship->get_weapon();
	$png = $ship->get_png();
	$left = $ship->get_left();
	$top = $ship->get_top();
	$direction = $ship->get_direction();
	$answer = array(
		'name' => $name,
		'size' => $size,
		'hp' => $hp,
		'PP' => $PP,
		'speed' => $speed,
		'handling' => $handling,
		'shield' => $shield,
		'weaponName' => $weaponName,
		'weapon' => $weapon,
		'png' => $png,
		'left' => $left,
		'top' => $top,
		'direction' => $direction,
	);
	echo json_encode($answer);
	// echo json_encode($game);
	
?>