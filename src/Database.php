<?php namespace AndrewLarsson\Helpers\PDO;

use \PDO;

class Database implements DatabaseInterface {
	private $connection;

	function __construct(DatabaseConfig $config) {
		$this->connection = new PDO(
			$config->driver . ":" . "dbname=" . $config->schema . ";" . "host=" . $config->host . ";" . "port=" . $config->port,
			$config->user,
			$config->password,
			[
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_STATEMENT_CLASS => [
					"\\AndrewLarsson\\Helpers\\PDO\\PDOStatement",
					[]
				]
			]
		);
	}

	public function exec($statement) {
		$this->connection->exec($statement);
	}

	public function prepare($statement) {
		return $this->connection->prepare($statement);
	}

	public function query($statement) {
		return $this->connection->query($statement);
	}

	public function beginTransaction() {
		$this->connection->beginTransaction();
	}

	public function commit() {
		$this->connection->commit();
	}

	public function rollBack() {
		$this->connection->rollBack();
	}

	public function lastInsertId() {
		$this->connection->lastInsertId();
	}

	public function getConnection() {
		return $this->connection;
	}
}
?>
