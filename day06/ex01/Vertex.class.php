<?php

Class Vertex {

	public static $verbose = False;

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	private $_color;

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }
	public function getColor() { return $this->_color; }

	public function setX($val) { $this->_x = $val; }
	public function setY($val) { $this->_y = $val; }
	public function setZ($val) { $this->_z = $val; }
	public function setW($val) { $this->_w = $val; }
	public function setColor($val) { $this->_color = $val; }

	public function __construct(array $arr) {

		if (array_key_exists('x', $arr)) {
			$this->setX($arr['x']);
		} else {
			$this->setX(0.0);
		}

		if (array_key_exists('y', $arr)) {
			$this->setY($arr['y']);
		} else {
			$this->setY(0.0);
		}

		if (array_key_exists('z', $arr)) {
			$this->setZ($arr['z']);
		} else {
			$this->setZ(0.0);
		}

		if (array_key_exists('w', $arr)) {
			$this->setW($arr['w']);
		} else {
			$this->setW(1.0);
		}

		if (array_key_exists('color', $arr) && $arr['color'] instanceof Color) {
			$this->setColor($arr['color']);
		} else {
			$this->setColor(new Color(array('rgb' => 0xFFFFFF)));
		}

		if (self::$verbose == TRUE) {
			printf("Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
		return;
	}
	
	public function __destruct() {
		if (self::$verbose == TRUE)
			printf("Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		return;
	}

	public function __toString() {
		if (self::$verbose) {
			return sprintf("Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
		return sprintf("Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	public static function doc() {
		$file = file_get_contents('Vertex.doc.txt');
		echo $file;
	}

}