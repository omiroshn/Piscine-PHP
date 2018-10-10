<?php

Class Vector {

	public static $verbose = False;

	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;

	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function getZ() { return $this->_z; }
	public function getW() { return $this->_w; }

	public function __construct(array $arr) {

		if (array_key_exists('orig', $arr)) {
			$orig = $arr['orig'];
		} else {
			$orig = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0));
		}
		if (array_key_exists('dest', $arr)) {
			$dest = $arr['dest'];
		} else {
			$dest = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0));
		}

		$this->_x = $dest->getX() - $orig->getX();
		$this->_y = $dest->getY() - $orig->getY();
		$this->_z = $dest->getZ() - $orig->getZ();
		$this->_w = 0.0;


		if (self::$verbose == TRUE) {
			printf("Vector( x:%3.2f, y:%3.2f, z:%3.2f, w:%3.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		}
		return;
	}
	
	public function __destruct() {
		if (self::$verbose == TRUE)
			printf("Vector( x:%3.2f, y:%3.2f, z:%3.2f, w:%3.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
		return;
	}

	public function __toString() {
		if (self::$verbose == TRUE) {
			return sprintf("Vector( x:%3.2f, y:%3.2f, z:%3.2f, w:%3.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
		}
	}

	public static function doc() {
		$file = file_get_contents('Vector.doc.txt');
		echo $file;
	}

	public function magnitude() {
		return sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z);
	}

	public function normalize() {
		$vertex = new Vertex(array('x' => $this->getX(), 'y' => $this->getY(), 'z' => $this->getZ(), 'w' => $this->getW()));
		$len = $this->magnitude();
		if ($len > 0) {
			$vertex->setX($vertex->getX() / $len);
			$vertex->setY($vertex->getY() / $len);
			$vertex->setZ($vertex->getZ() / $len);
		}
		return new Vector(array('dest' => $vertex));
	}

	public function add($vec) {
		$x = $this->getX() + $vec->getX();
		$y = $this->getY() + $vec->getY();
		$z = $this->getZ() + $vec->getZ();
		$vertex = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z, 'w' => $this->getW()));
		$newVec = new Vector(array('dest' => $vertex));
		return $newVec;
	}

	public function sub($vec) {
		$x = $this->getX() - $vec->getX();
		$y = $this->getY() - $vec->getY();
		$z = $this->getZ() - $vec->getZ();
		$vertex = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z, 'w' => $this->getW()));
		$newVec = new Vector(array('dest' => $vertex));
		return $newVec;
	}

	public function opposite() {
		$x = -$this->getX();
		$y = -$this->getY();
		$z = -$this->getZ();
		$vertex = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z, 'w' => $this->getW()));
		$newVec = new Vector(array('dest' => $vertex));
		return $newVec;
	}

	public function scalarProduct($coef) {
		$x = $this->getX() * $coef;
		$y = $this->getY() * $coef;
		$z = $this->getZ() * $coef;
		$vertex = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z, 'w' => $this->getW()));
		$newVec = new Vector(array('dest' => $vertex));
		return $newVec;
	}

	public function dotProduct($vec) {
		return $this->getX() * $vec->getX() + $this->getY() * $vec->getY() + $this->getZ() * $vec->getZ();
	}

	public function crossProduct($vec) {
		$x = $this->getY() * $vec->getZ() - $this->getZ() * $vec->getY();
		$y = $this->getZ() * $vec->getX() - $this->getX() * $vec->getZ();
		$z = $this->getX() * $vec->getY() - $this->getY() * $vec->getX();
		$vertex = new Vertex(array('x' => $x, 'y' => $y, 'z' => $z, 'w' => $this->getW()));
		$newVec = new Vector(array('dest' => $vertex));
		return $newVec;
	}

	public function cos($vec) {
		return $this->dotProduct($vec) / sqrt($this->dotProduct($this) * $vec->dotProduct($vec));
	}
}