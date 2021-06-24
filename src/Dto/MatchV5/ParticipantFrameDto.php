<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class ParticipantFrameDto extends BaseDto
	{
	    /** @var ChampionStatDto */
        public $championStats;
        /** @var int */
        public $currentGold;
        /** @var DamageStatDto */
        public $damageStats;
        /** @var int */
        public $goldPerSecond;
        /** @var int */
        public $jungleMinionsKilled;
        /** @var int */
        public $level;
        /** @var int */
        public $minionsKilled;
        /** @var int */
        public $participantId;
        /** @var PositionDto */
        public $position;
        /** @var int */
        public $timeEnemySpentControlled;
        /** @var int */
        public $totalGold;
        /** @var int */
        public $xp;
	}