<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:54
	 */

	namespace RiotQuest\Dto\LolStaticData\Champion;

	use RiotQuest\Dto\BaseDto;

	class InfoDto extends BaseDto
	{
		/** @var int */
		public $difficulty;
		/** @var int */
		public $attack;
		/** @var int */
		public $defense;
		/** @var int */
		public $magic;
	}