<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class TeamBanDto extends BaseDto
	{
		/** @var int */
		public $pickTurn;
		/** @var int */
		public $championId;
	}