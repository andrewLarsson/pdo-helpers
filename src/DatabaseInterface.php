<?php namespace AndrewLarsson\Helpers\PDO;

interface DatabaseInterface {
	public function exec($statement);
	public function prepare($statement);
	public function beginTransaction();
	public function commit();
	public function rollBack();
	public function lastInsertId($name = null);
	public function getConnection();
}
?>
