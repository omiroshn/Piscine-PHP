<?php 

abstract class Weapon
{
	protected $name = "Default Weapon";
	protected $charge = 0;
	protected $shortRange = "0-0";
	protected $middleRange = "0-0";
	protected $longRange = "0-0";
	protected $effectZone = "None.";
	protected $special = "None.";

	public function get_name() {return $this->name;}
	public function get_charge() {return $this->charge;}
	public function get_shortRange() {return $this->shortRange;}
	public function get_middleRange() {return $this->middleRange;}
	public function get_longRange() {return $this->longRange;}
	public function get_effectZone() {return $this->effectZone;}
	public function get_special() {return $this->special;}
}

class WeaponA extends Weapon
{
	public function __construct()
	{
		$this->name = "Nautical lance";	
		$this->charge = 0;
		$this->shortRange = "1-30";
		$this->middleRange = "31-60";
		$this->longRange = "61-90";
		$this->effectZone = "A straight line or column 1 cell wide that start from the front of the ship.";
	}
}

class WeaponB extends Weapon
{
	public function __construct()
	{
		$this->name = "Heavy nautical lance";	
		$this->charge = 3;
		$this->shortRange = "1-30";
		$this->middleRange = "31-60";
		$this->longRange = "61-90";
		$this->effectZone = "A straing line or columns of 1 cell wide that start from the front of the ship.";
		$this->special = "The shooter must be stationary to be able to shoot. Furthemore, as long
			as the shoot destroys its target, the dice can be thrown again to attempt to
			destroy a target located behind the original one as long as the maximum range
			of the weapon isn’t reached.";
	}
}

class WeaponC extends Weapon
{
	public function __construct()
	{
		$this->name = "Close range super heavy automatic weapon";	
		$this->charge = 5;
		$this->shortRange = "1-3";
		$this->middleRange = "4-7";
		$this->longRange = "8-10";
		$this->effectZone = "ny cell within range.";
	}
}

class WeaponD extends Weapon
{
	public function __construct()
	{
		$this->name = "Macro canon";	
		$this->charge = 0;
		$this->shortRange = "1-10";
		$this->middleRange = "11-20";
		$this->longRange = "21-30";
		$this->effectZone = "A straing line or columns of 1 cell wide that start from the front of the ship.";
		$this->special = "The explosion of the amo reaches multiple boxes. The center of the
			explosion is located on the closest target’s hit cell from the shooter. The
			explosion covers \"a circle\" of 9 cells";
	}
}
