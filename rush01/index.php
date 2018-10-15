<?php

session_start();

require_once("Singleton.trait.php");
require_once("Ship.class.php");
require_once("Dice.class.php");
require_once("GameEntity.class.php");

/*<img src="images/dice/<?php echo $dice->getDice(); ?>.png">*/

	if (!isset($_SESSION['game'])) {;
		$game = new GameEntity();
		$_SESSION['game'] = serialize($game);
	} else {
		$game = unserialize($_SESSION['game']);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="style.css" rel="stylesheet">
	<title>Game</title>
	<style type="text/css">
		
		.ship {
			width: 100px;
			position: absolute;
		}

		#gameboard {
			display: flex;
			flex-direction: row;
		}

		#info {
			max-width: 300px;
		}

		#field {
			position: relative;
		}
		.bullet {
			height: 20px;
			width: 20px;
			background-color: red;
			position: absolute;
			border-radius: 100%;
		}
		#ship1 {
			border : <?php
				if ($game->get_current_ship() == 0) {
					echo "green 2px solid;";
				} else {
					echo "transparent 2px solid;";
				}
			?>
			left: <?php echo $game->ships[0]->get_left() . 'px;' ?>
			top: <?php echo $game->ships[0]->get_top() . 'px;' ?> 
		}
		#ship2 {
			border : <?php
				if ($game->get_current_ship() == 1) {
					echo "green 2px solid;";
				} else {
					echo "transparent 2px solid;";
				}
			?>
			transform: scaleX(-1);
			left: <?php echo $game->ships[1]->get_left() . 'px;' ?>
			top: <?php echo $game->ships[1]->get_top() . 'px;' ?> 

		}
		#ship3 {
			border : <?php
				if ($game->get_current_ship() == 2) {
					echo "green 2px solid;";
				} else {
					echo "transparent 2px solid;";
				}
			?>
			left: <?php echo $game->ships[2]->get_left() . 'px;' ?>
			top: <?php echo $game->ships[2]->get_top() . 'px;' ?> 
		}
		#ship4 {
			border : <?php
				if ($game->get_current_ship() == 3) {
					echo "green 2px solid;";
				} else {
					echo "transparent 2px solid;";
				}
			?>
			transform: scaleX(-1);
			left: <?php echo $game->ships[3]->get_left() . 'px;' ?>
			top: <?php echo $game->ships[3]->get_top() . 'px;' ?> 
		}

	</style>
</head>
<body>
	<div id="gameboard">
		<div id="field">
			<img class="ship" id="ship1" src=" <?php echo $game->ships[0]->get_png() ?> "/>
			<img class="ship" id="ship2" src=" <?php echo $game->ships[1]->get_png() ?> "/>
			<img class="ship" id="ship3" src=" <?php echo $game->ships[2]->get_png() ?> "/>
			<img class="ship" id="ship4" src=" <?php echo $game->ships[3]->get_png() ?> "/>
		</div>
		<div id="info">
			<ul>
				<li id="name">
					Name: <?php echo $game->ships[$game->get_current_ship()]->get_name(); ?>
				</li>
				<li id="ammo">
					Size: <?php echo $game->ships[$game->get_current_ship()]->get_size(); ?>
				</li>
				<li id="hp">
					HP: <?php echo $game->ships[$game->get_current_ship()]->get_hp(); ?>
				</li>
				<li id="PP">
					PP: <?php echo $game->ships[$game->get_current_ship()]->get_hp(); ?>
				</li>
				<li id="speed">
					Speed: <?php echo $game->ships[$game->get_current_ship()]->get_speed(); ?>
				</li>
				<li id="handling">
					Handling: <?php echo $game->ships[$game->get_current_ship()]->get_handling(); ?>
				</li>
				<li id="shield">
					Shield: <?php echo $game->ships[$game->get_current_ship()]->get_shield(); ?>
				</li>
				<li id="weaponName">
					WeaponName: <?php echo $game->ships[$game->get_current_ship()]->get_weaponName(); ?>
				</li>
				<li id="weapon">
					Weapon: <?php echo $game->ships[$game->get_current_ship()]->get_weapon()->get_name(); ?>
				</li>
				<li id="weapon">
					Weapon effectZone: <?php echo $game->ships[$game->get_current_ship()]->get_weapon()->get_effectZone(); ?>
				</li>
				<li id="weapon">
					Weapon special: <?php echo $game->ships[$game->get_current_ship()]->get_weapon()->get_special(); ?>
				</li>
				<li id="left">
					Left: <?php echo $game->ships[$game->get_current_ship()]->get_left(); ?>
				</li>
				<li id="top">
					Top: <?php echo $game->ships[$game->get_current_ship()]->get_top(); ?>
				</li>
			</ul>
			</ul>
		</div>
	</div>
	<div id="controls">
		<form method="post" action="index.php" id="form">
			<button class="action" data-value="UP">UP</button>
			<button class="action" data-value="DOWN">DOWN</button>
			<button class="action" data-value="LEFT">LEFT</button>
			<button class="action" data-value="RIGHT">RIGHT</button>
			<button class="shoot" data-value="SHOOT">Shoot</button>
			<button class="action" data-value="NEXT TURN">Next Turn</button>
		</form>
	</div>
	<script src='scripts.js'></script>
	<script>


		function changeTurn(response) {
			console.log(response);
			var res = JSON.parse(response);
			console.log(res);
			location.reload();
		}

		$(".action").click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'GET',
				url: 'action.php',
				data: { value: $(this).data('value') },
				success: changeTurn
			});
		})

		function shoot(responce) {
			var res = JSON.parse(responce);
			let field = $('#field');
			let bullet = $('<div>').addClass('bullet');
			field.append(bullet);

			var start = res['left'] + 100;
			var distance = parseInt(res['distance'][1]) * 10;
			var direction = res['direction'];
			if (!direction) {
				bullet.css({
					top: res['top'] + 'px',
					left: start + 'px'
				})
				if (start < direction) {
					for (let i = start, time = 0; i < distance; i++, time++) {
						setTimeout(() => {
							bullet.css({
								left: i + 'px',
							})
							if (i == (distance) - 1)
								bullet.remove();
						}, 10 * time);
					}
				} else {
					for (let i = start, time = 0; i < start + distance; i++, time++) {
						setTimeout(() => {
							bullet.css({
								left: i + 'px',
							})
							if (i == (start + distance) - 1)
								bullet.remove();
						}, 10 * time);
					}
				}
			} else {
				bullet.css({
					top: res['top'] + 'px',
					left: start - 120 + 'px'
				})
				for (let i = start - 120, time = 0; i >= start - 120 - distance; i--, time++) {
					setTimeout(() => {
						bullet.css({
							left: i + 'px',
						})
						if (i == (start - 120 - distance + 1))
							bullet.remove();
					}, 10 * time);
				}
			}
		}

		$(".shoot").click(function(e) {
			e.preventDefault();
			$.ajax({
				type: 'GET',
				url: 'shoot.php',
				data: { value: $(this).data('value') },
				success: shoot
			});
		})


	</script>
</body>
</html>
