<?php namespace AndrewLarsson\Helpers\PDO;

class RecordsMetaData {
	public $TotalRecordCount;
	public $TotalPagesCount;
	
	public function __construct($TotalRecordCount, PagingMetaData $PagingMetaData) {
		$this->TotalRecordCount = $TotalRecordCount;
		$this->TotalPagesCount = (($PagingMetaData->PageSize == 0)
			? 0
			: (
				($this->TotalRecordCount / $PagingMetaData->PageSize)
				+ ((($this->TotalRecordCount % $PagingMetaData->PageSize) == 0)
					? 0
					: 1
				)
			)
		);
	}
}
?>
