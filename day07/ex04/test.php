<?php

include_once('Lannister.class.php');
include_once('Jaime.class.php');
include_once('Tyrion.class.php');

class Stark {
}

class Cersei extends Lannister {
}

class Sansa extends Stark {
}

class Other extends Lannister {
}

$jaime = new Jaime();
$cersei = new Cersei();
$tyrion = new Tyrion();
$sansa = new Sansa();
$other = new Other();

$jaime->sleepWith($tyrion);
$jaime->sleepWith($sansa);
$jaime->sleepWith($cersei);

$tyrion->sleepWith($jaime);
$tyrion->sleepWith($sansa);
$tyrion->sleepWith($cersei);

echo "\nOther:\n";
$jaime->sleepWith($other);
$tyrion->sleepWith($other);

?>
