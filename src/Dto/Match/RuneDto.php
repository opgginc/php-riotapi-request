<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:26
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	class RuneDto extends BaseDto
	{
		/** @var int */
		public $runeId;
		/** @var int */
		public $rank;
	}