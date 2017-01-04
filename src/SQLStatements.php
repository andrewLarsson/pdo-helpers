<?php namespace AndrewLarsson\Helpers\PDO;

use \Exception;

class SQLStatements {
	private static $directory;

	public static function __initialize($directory = "") {
		self::$directory = $directory;
	}

	public static function __callStatic($method, $arguments) {
		$filePath = self::$directory . DIRECTORY_SEPARATOR . $method . ".sql";
		if (!file_exists($filePath)) {
			throw new Exception("SQL file \"" . $filePath . "\" does not exist.");
		}
		return file_get_contents($filePath);
	}
}
?>
