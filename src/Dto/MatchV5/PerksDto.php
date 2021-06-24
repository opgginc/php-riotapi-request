<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

    class PerksDto extends BaseDto
	{
		/** @var PerkStat */
		public $statPerks;
		/** @var PerkStyle[] */
		public $styles;
	}