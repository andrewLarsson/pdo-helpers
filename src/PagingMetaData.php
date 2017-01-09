<?php namespace AndrewLarsson\Helpers\PDO;

use \Exception;

class PagingMetaData {
	public $PageSize;
	public $PageNumber;
	
	public function __construct($PageSize, $PageNumber, $PageSizeLimit) {
		if ($PageSize > $PageSizeLimit) {
			throw new Exception('PageSize limit is ' . $PageSizeLimit . '.');
		}
		$this->PageSize = $PageSize;
		$this->PageNumber = $PageNumber;
	}
}
?>
