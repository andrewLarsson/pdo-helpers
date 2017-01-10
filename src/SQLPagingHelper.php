<?php namespace AndrewLarsson\Helpers\PDO;

use \PDO;

class SQLPagingHelper {
	public static function prepareSearchAndExecuteWithPaging(DatabaseInterface $database, ModelAbstract $model, Array $columns = [], PagingMetaData $paging = null) {
		return new PagingRecordSet([
			'PagingMetaData' => $paging,
			'RecordsMetaData' => new RecordsMetaData(
				SQLHelper::prepareCount(
					$database,
					$model
				)->cexecute()->fetch()['COUNT'],
				$paging
			),
			'Records' => SQLHelper::prepareSearch(
				$database,
				$model,
				$columns,
				$paging
			)->cexecute()->fetchAll(
				PDO::FETCH_CLASS,
				get_class($model)
			)
		]);
	}
}
?>
