<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class DamageStatDto extends BaseDto
	{
        /** @var int */
        public $magicDamageDone;
        /** @var int */
        public $magicDamageDoneToChampions;
        /** @var int */
        public $magicDamageTaken;
        /** @var int */
        public $physicalDamageDone;
        /** @var int */
        public $physicalDamageDoneToChampions;
        /** @var int */
        public $physicalDamageTaken;
        /** @var int */
        public $totalDamageDone;
        /** @var int */
        public $totalDamageDoneToChampions;
        /** @var int */
        public $totalDamageTaken;
        /** @var int */
        public $trueDamageDone;
        /** @var int */
        public $trueDamageDoneToChampions;
        /** @var int */
        public $trueDamageTaken;
	}