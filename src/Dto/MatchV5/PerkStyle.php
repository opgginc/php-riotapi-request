<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class PerkStyle extends BaseDto
	{
        /** @var string */
        public $description;
        /** @var PerkStyleDetail[] */
        public $selections;
        /** @var int */
        public $style;
	}