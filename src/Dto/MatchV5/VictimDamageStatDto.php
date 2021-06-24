<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class VictimDamageStatDto extends BaseDto
	{
        /** @var boolean */
        public $basic;
        /** @var int */
        public $magicDamage;
        /** @var string */
        public $name;
        /** @var int */
        public $participantId;
        /** @var int */
        public $physicalDamage;
        /** @var string */
        public $spellName;
        /** @var int */
        public $spellSlot;
        /** @var int */
        public $trueDamage;
        /** @var string */
        public $type;
	}