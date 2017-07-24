<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:34
	 */

	namespace RiotQuest\Dto\Match\Timeline;

	use RiotQuest\Dto\BaseDto;

	class MatchPositionDto extends BaseDto
	{
		/** @var int */
		public $y;
		/** @var int */
		public $x;
	}