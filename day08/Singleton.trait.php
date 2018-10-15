<?php

trait Singleton {
	protected static $instance;
	
	public function __construct() {
		static::setInstance($this);
	}
	final public static function setInstance($instance) {
		static::$instance = $instance;
		return static::$instance;
	}
	final public static function getInstance($instance) {
		return isset(static::$instance)
			? static::$instance
			: static::$instance = new static;
	}
}