<?php namespace AndrewLarsson\Helpers\PDO;

use AndrewLarsson\Helpers\InitializableAbstract;

abstract class ModelAbstract extends InitializableAbstract {
	private static $TABLE;
	private static $PRIMARY_KEY;

	final public function __construct(Array $properties = []) {
		self::$TABLE = static::TABLE;
		self::$PRIMARY_KEY = static::PRIMARY_KEY;
		$this->__init($properties);
	}
}
?>
