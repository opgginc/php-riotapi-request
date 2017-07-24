<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:06
	 */

	namespace RiotQuest\Dto\League;

	use RiotQuest\Dto\BaseDto;

	class MiniSeriesDTO extends BaseDto
	{
		/** @var int */
		public $wins;
		/** @var int */
		public $losses;
		/** @var int */
		public $target;
		/** @var string */
		public $progress;
	}