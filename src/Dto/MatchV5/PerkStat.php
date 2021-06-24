<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class PerkStat extends BaseDto
	{
		/** @var int */
        public $defense;
        /** @var int */
        public $flex;
        /** @var int */
        public $offense;
	}