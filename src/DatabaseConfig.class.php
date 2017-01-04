<?php namespace AndrewLarsson\Helpers\PDO;

use AndrewLarsson\Helpers\InitializableAbstract;

class DatabaseConfig extends InitializableAbstract {
	public $driver;
	public $host;
	public $port;
	public $user;
	public $password;
	public $schema;
}
?>
