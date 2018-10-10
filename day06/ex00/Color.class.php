<?php

Class Color {
	
	public static $verbose = False;

	public $red = 0;
	public $green = 0;
	public $blue = 0;

	public function __construct(array $arr) {

		if (!$arr['rgb']) {
			$this->red = $arr['red'];
			$this->green = $arr['green'];
			$this->blue = $arr['blue'];
		} else {
			$this->red = ($arr['rgb'] >> 16) & 255;
			$this->green = ($arr['rgb'] >> 8) & 255;
			$this->blue = $arr['rgb'] & 255;
		}

		if (self::$verbose == TRUE)
			printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
		return;
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		return;
	}

	public function __toString() {
		return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	public static function doc() {
		$file = file_get_contents('Color.doc.txt');
		echo $file;
	}

	public function add(Color $color) {
		$red = $this->red + $color->red;
		$green = $this->green + $color->green;
		$blue = $this->blue + $color->blue;
		return new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
	}

	public function sub(Color $color) {
		$red = $this->red - $color->red;
		$green = $this->green - $color->green;
		$blue = $this->blue - $color->blue;
		return new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
	}

	public function mult($coef) {
		$red = $this->red * $coef;
		$green = $this->green * $coef;
		$blue = $this->blue * $coef;
		return new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
	}

}