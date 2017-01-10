<?php namespace AndrewLarsson\Helpers\PDO;

use \Exception;

class PagingMetaData {
	public $PageSize;
	public $PageNumber;
	
	public function __construct($PageSize, $PageNumber, $PageSizeLimit) {
		if ($PageSize > $PageSizeLimit) {
			throw new Exception('Limit for PageSize is ' . $PageSizeLimit . '.');
		}
		if ($PageNumber < 0) {
			throw new Exception('Invalid PageNumber.');
		}
		$this->PageSize = $PageSize;
		$this->PageNumber = $PageNumber;
	}
}
?>
