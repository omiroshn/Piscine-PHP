<?php

session_start();

require_once('GameEntity.class.php');

	if (!empty($_POST))
	{
		if ($_POST['value'] === "DOWN") {
			$game->ships[$game->ship]->down();
			$_POST = array();
			$_SESSION["game"] = serialize($game);
		} else if ($_POST['value'] === "UP") {
			$game->ships[$game->ship]->up();
			$_POST = array();
		    $_SESSION["game"] = serialize($game);
		} else if ($_POST['value'] === "LEFT") {
			$game->ships[$game->ship]->left();
			$_POST = array();
		    $_SESSION["game"] = serialize($game);
		} else if ($_POST['value'] === "RIGHT") {
			$game->ships[$game->ship]->right();
			$_POST = array();
		    $_SESSION["game"] = serialize($game);
		} else if ($_POST["value"] === "CHANGE SHIP") {
			$game->switchShip();
			$_POST = array();
			$_SESSION["game"] = serialize($game);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link href="style.css" rel="stylesheet">
	<title>Game</title>
</head>
<body>
	<div id="gameboard">
		<div id="field">
			<img style="left: <?php echo $game->ships[0]->left . 'px;' ?> top: <?php echo $game->ships[0]->top . 'px;' ?> " id="ship-1" src="images/ship-1.jpg"/>
			<img style="left: <?php echo $game->ships[1]->left . 'px;' ?> top: <?php echo $game->ships[1]->top . 'px;' ?> " id="ship-2" src="images/ship-2.jpg"/>
		</div>
		<form method="post" action="index.php" id="form">
			<button class="move-btn" data-value="CHANGE SHIP">CHANGE SHIP</button>
			<button class="move-btn" data-value="UP">UP</button>
			<button class="move-btn" data-value="DOWN">DOWN</button>
			<button class="move-btn" data-value="LEFT">LEFT</button>
			<button class="move-btn" data-value="RIGHT">RIGHT</button>
			<input type="hidden" name="value" id="value">
		</form>
	</div>
	<script src='scripts.js'></script>
	<script type="text/javascript">

		var buttons = document.getElementsByClassName('move-btn');
		var form = document.getElementById('form');
		var value = document.getElementById('value');

		Array.from(buttons).forEach(button => {
			button.addEventListener('click', () => {

				var event = new MouseEvent('click', {
								bubbles: true,
								cancelable: true,
								view: window
							});
				value.value = button.dataset.value
				form.dispatchEvent(event);
			})
		})

	</script>
</body>
</html>
