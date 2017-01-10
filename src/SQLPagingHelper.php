<?php namespace AndrewLarsson\Helpers\PDO;

use \PDO;

class SQLExecutionHelper {
	public static function insert(DatabaseInterface $database, ModelAbstract $model) {
		return SQLHelper::prepareInsert(
			$database,
			$model
		)->execute();
	}
	
	public static function select(DatabaseInterface $database, ModelAbstract $model, Array $columns = []) {
		return SQLHelper::prepareSelect(
			$database,
			$model,
			$columns
		)->cexecute()->fetchObject(
			get_class($model)
		);
	}
	
	public static function selectAll(DatabaseInterface $database, ModelAbstract $model, Array $columns = []) {
		return SQLHelper::prepareSelectAll(
			$database,
			$model,
			$columns
		)->cexecute()->fetchAll(
			PDO::FETCH_CLASS,
			get_class($model)
		);
	}
	
	public static function selectAllWithPaging(DatabaseInterface $database, ModelAbstract $model, PagingMetaData $paging, Array $columns = []) {
		return new PagingRecordSet([
			"PagingMetaData" => $paging,
			"RecordsMetaData" => new RecordsMetaData(
				self::count($database, $model),
				$paging
			),
			"Records" => SQLHelper::prepareSelectAllWithPaging(
				$database,
				$model,
				$paging,
				$columns
			)->cexecute()->fetchAll(
				PDO::FETCH_CLASS,
				get_class($model)
			)
		]);
	}
	
	public static function search(DatabaseInterface $database, ModelAbstract $model, Array $columns = []) {
		return SQLHelper::prepareSearch(
			$database,
			$model,
			$columns
		)->cexecute()->fetchAll(
			PDO::FETCH_CLASS,
			get_class($model)
		);
	}
	
	public static function searchWithPaging(DatabaseInterface $database, ModelAbstract $model, PagingMetaData $paging, Array $columns = []) {
		return new PagingRecordSet([
			"PagingMetaData" => $paging,
			"RecordsMetaData" => new RecordsMetaData(
				self::count($database, $model),
				$paging
			),
			"Records" => SQLHelper::prepareSearchWithPaging(
				$database,
				$model,
				$paging,
				$columns
			)->cexecute()->fetchAll(
				PDO::FETCH_CLASS,
				get_class($model)
			)
		]);
	}
	
	public static function count(DatabaseInterface $database, ModelAbstract $model) {
		return SQLHelper::prepareCount(
			$database,
			$model
		)->cexecute()->fetch()["COUNT"];
	}
	
	public static function update(DatabaseInterface $database, ModelAbstract $model) {
		return SQLHelper::prepareUpdate(
			$database,
			$model
		)->execute();
	}
	
	public static function delete(DatabaseInterface $database, ModelAbstract $model) {
		return SQLHelper::prepareDelete(
			$database,
			$model
		)->execute();
	}
}
?>
