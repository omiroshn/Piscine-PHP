<?php 

require_once("Weapon.class.php");

abstract class Ship
{
	protected $name = "Default Ship";
	protected $size = "1x1";
	protected $hp = 1;
	protected $PP = 1;
	protected $speed = 1;
	protected $handling = 0;
	protected $shield = 0;
	protected $weaponName = "None";
	protected $weapon;
	protected $png = "None";
	protected $left = 0;
	protected $top = 0;
	protected $direction = 0;

	public function get_name() {return $this->name;}
	public function get_size() {return $this->size;}
	public function get_hp() {return $this->hp;}
	public function get_PP() {return $this->PP;}
	public function get_speed() {return $this->speed;}
	public function get_handling() {return $this->handling;}
	public function get_shield() {return $this->shield;}
	public function get_weaponName() {return $this->weaponName;}
	public function get_weapon() {return $this->weapon;}
	public function get_png() {return $this->png;}
	public function get_left() {return $this->left;}
	public function get_top() {return $this->top;}
	public function get_direction() {return $this->direction;}

	public function set_hp($hp) {
		$this->hp = $hp;
	}

	public function down() {$this->top += $this->speed;}
	public function up() {$this->top -= $this->speed;}
	public function left() {$this->left -= $this->speed;}
	public function right() {$this->left += $this->speed;}
}

class ShipA extends Ship
{
	function __construct($left, $top, $direction) {
		$this->name = "Honorable Duty";
		$this->size = "1x4";
		$this->hp = 5;
		$this->PP = 10;
		$this->speed = 15;
		$this->handling = 4;
		$this->shield = 0;
		$this->weaponName = "Close range super heavy automatic weapon";
		$this->weapon = new WeaponA();
		$this->png = "images/ships/A.png";
		$this->left = $left;
		$this->top = $top;
		$this->direction = $direction;
	}
}

class ShipB extends Ship
{
	function __construct($left, $top, $direction) {
		$this->name = "Sword Of Absolution";
		$this->size = "1x3";
		$this->hp = 4;
		$this->PP = 10;
		$this->speed = 18;
		$this->handling = 3;
		$this->shield = 0;
		$this->weaponName = "Heavy nautical lance";
		$this->weapon = new WeaponB();
		$this->png = "images/ships/B.png";
		$this->left = $left;
		$this->top = $top;
		$this->direction = $direction;
	}
}

class ShipC extends Ship
{
	function __construct($left, $top, $direction) {
		$this->name = "Hand Of The Emperor";
		$this->size = "1x4";
		$this->hp = 5;
		$this->PP = 10;
		$this->speed = 15;
		$this->handling = 4;
		$this->shield = 0;
		$this->weaponName = "Nautical Lance";
		$this->weapon = new WeaponC();
		$this->png = "images/ships/C.png";
		$this->left = $left;
		$this->top = $top;
		$this->direction = $direction;
	}
}

class ShipD extends Ship
{
	function __construct($left, $top, $direction) {
		$this->name = "Ork’N’Roll !";
		$this->size = "1x5";
		$this->hp = 6;
		$this->PP = 10;
		$this->speed = 12;
		$this->handling = 4;
		$this->shield = 0;
		$this->weaponName = "Macro canon";
		$this->weapon = new WeaponD();
		$this->png = "images/ships/D.png";
		$this->left = $left;
		$this->top = $top;
		$this->direction = $direction;
	}
}

class Factory
{
	public function create($type, $left, $top, $direction)
	{
		switch ($type) {
			case'B':
				return new ShipB($left, $top, $direction);
			case'C':
				return new ShipC($left, $top, $direction);
			case'D':
				return new ShipD($left, $top, $direction);
			case'A':
			default:
				return new ShipA($left, $top, $direction);
		}
	}
}
