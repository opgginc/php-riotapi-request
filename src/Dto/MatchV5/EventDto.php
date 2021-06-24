<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class EventDto extends BaseDto
	{
		const TYPE_PAUSE_END = "PAUSE_END";
		const TYPE_GAME_END = "GAME_END";
		const TYPE_WARD_PLACED = "WARD_PLACED";
		const TYPE_WARD_KILL = "WARD_KILL";
		const TYPE_LEVEL_UP = "LEVEL_UP";
		const TYPE_SKILL_LEVEL_UP = "SKILL_LEVEL_UP";
		const TYPE_ITEM_PURCHASED = "ITEM_PURCHASED";
		const TYPE_ITEM_SOLD = "ITEM_SOLD";
		const TYPE_ITEM_DESTROYED = "ITEM_DESTROYED";
		const TYPE_ITEM_UNDO = "ITEM_UNDO";
		const TYPE_ELITE_MONSTER_KILL = "ELITE_MONSTER_KILL";
		const TYPE_CHAMPION_KILL = "CHAMPION_KILL";
		const TYPE_CHAMPION_SPECIAL_KILL = "CHAMPION_SPECIAL_KILL";
		const TYPE_BUILDING_KILL = "BUILDING_KILL";
		const TYPE_TURRET_PLATE_DESTROYED = "TURRET_PLATE_DESTROYED";
		const TYPE_ASCENDED_EVENT = "ASCENDED_EVENT";
		const TYPE_CAPTURE_POINT = "CAPTURE_POINT";
		const TYPE_PORO_KING_SUMMON = "PORO_KING_SUMMON";

		/** @var string */
		public $type;

        /** @var \RiotQuest\Dto\DateTime */
        public $timestamp;
		/** @var \RiotQuest\Dto\DateTime */
        public $realTimestamp;
        /** @var int */
        public $winningTeam;
        /** @var int */
        public $gameId;

        // WARD Events
        /** @var int */
        public $creatorId;
        /** @var int */
        public $killerId;
        /** @var string */
        public $wardType;

        // LEVELUP Events
        /** @var int */
        public $level;
        /** @var int */
        public $participantId;
        /** @var string */
        public $levelUpType;
        /** @var int */
        public $skillSlot;

        // ITEM Events
        /** @var int */
        public $itemId;
        /** @var int */
        public $afterId;
        /** @var int */
        public $beforeId;
        /** @var int */
        public $goldGain;

        // MONSTER Events
        /** @var int[] */
        public $assistingParticipantIds;
        /** @var int */
        public $killerTeamId;
        /** @var string */
        public $monsterSubType;
        /** @var string */
        public $monsterType;
        /** @var PositionDto */
        public $position;

        // KILL Events
        /** @var int */
        public $bounty;
        /** @var int */
        public $killStreakLength;
        /** @var int */
        public $victimId;
        /** @var VictimDamageStatDto[] */
        public $victimDamageDealt;
        /** @var VictimDamageStatDto[] */
        public $victimDamageReceived;
        /** @var string */
        public $killType;
        /** @var int */
        public $multiKillLength;
        /** @var string */
        public $buildingType;
        /** @var string */
        public $laneType;
        /** @var string */
        public $towerType;
        /** @var int */
        public $teamId;

		/** @var string */
		public $ascendedType;
		/** @var string */
		public $pointCaptured;
	}