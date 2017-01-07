<?php namespace AndrewLarsson\Helpers\PDO;

use \Exception;

class SQLStatements {
	private $directory;

	public function __construct($directory = "") {
		$this->directory = $directory;
	}

	public function __get($name) {
		$filePath = $this->directory . DIRECTORY_SEPARATOR . $name . ".sql";
		if (!file_exists($filePath)) {
			throw new Exception("SQL file \"" . $filePath . "\" does not exist.");
		}
		return file_get_contents($filePath);
	}
}
?>
