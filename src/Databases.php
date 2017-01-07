<?php namespace AndrewLarsson\Helpers\PDO;

use \Exception;
use AndrewLarsson\Helpers\INIParser;

class Databases {
	private $databases;
	private $configs;

	public function __construct($directory = "") {
		$this->databases = [];
		$this->configs = new INIParser($directory, DatabaseConfig::class);
	}

	public function __get($name) {
		if (!$this->configs->offsetExists($name)) {
			throw new Exception("DatabaseConfig \"" . $name . "\" does not exist.");
		}
		if (!array_key_exists($name, $this->databases)) {
			$this->databases[$name] = new Database($this->configs[$name]);
		}
		return $this->databases[$name];
	}
}
?>
