<?php namespace AndrewLarsson\Helpers\PDO;

class PDOStatement extends \PDOStatement {
	protected function __construct() {
	}

	public function cexecute($inputParameters = []) {
		return (
			(
				((empty($inputParameters))
					? parent::execute()
					: parent::execute($inputParameters)
				)
			)
			? $this
			: false
		);
	}
}
?>
