<?php

include_once('IFighter.class.php');
include_once('NightsWatch.class.php');

class JonSnow implements IFighter {
	public function fight() {
		print("* looses his wolf on the enemy, and charges with courage *" . PHP_EOL);
	}
	public function isABastard() {
		return True;
	}
}

class MaesterAemon {
	public function sendRavens() {
		print("* sends a raven carrying an important message *" . PHP_EOL);
	}
}

class SamwellTarly implements IFighter {
	public function fight() {
		print("* flees, finds a girl, grows a spine, and defends her to the bitter end *" . PHP_EOL);
	}
	public function makeHisFatherProud() {
		return False;
	}
}

$jonSnow = new JonSnow();
$maesterAemon = new MaesterAemon();
$samwellTarly = new SamwellTarly();
$nightWatch = new NightsWatch();

$nightWatch->recruit($jonSnow);
$nightWatch->recruit($maesterAemon);
$nightWatch->recruit($samwellTarly);

$nightWatch->fight();

?>
