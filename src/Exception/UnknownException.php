<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-25
	 * Time: 19:45
	 */

	namespace RiotQuest\Exception;

	class UnknownException extends \RuntimeException
	{
		public function __toString() {
			return "[" . get_class($this) . ":{$this->getCode()}] " . $this->getMessage();
		}
	}