<?php

Class Spaceship {

	public $left;
	public $top;

	public function __construct($left, $top) {
		$this->left = $left;
		$this->top = $top;
	}

	public function down() {
		$this->top += 10;
	}

	public function up() {
		$this->top -= 10;
	}

	public function left() {
		$this->left -= 10;
	}

	public function right() {
		$this->left += 10;
	}
}
