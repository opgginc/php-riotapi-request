<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:24
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	class TeamBansDto extends BaseDto
	{
		/** @var int */
		public $pickTurn;
		/** @var int */
		public $championId;
	}