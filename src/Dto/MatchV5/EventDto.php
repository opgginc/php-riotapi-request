<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class EventDto extends BaseDto
	{
		const TYPE_PAUSE_END = "PAUSE_END";
		const TYPE_PAUSE_START = "PAUSE_START";
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
        const TYPE_CHAMPION_TRANSFORM = "CHAMPION_TRANSFORM";
        const TYPE_DRAGON_SOUL_GIVEN = "DRAGON_SOUL_GIVEN";
        const TYPE_CHAMPION_KILL = "CHAMPION_KILL";
        const TYPE_CHAMPION_SPECIAL_KILL = "CHAMPION_SPECIAL_KILL";
        const TYPE_BUILDING_KILL = "BUILDING_KILL";
        const TYPE_TURRET_PLATE_DESTROYED = "TURRET_PLATE_DESTROYED";
        const TYPE_ASCENDED_EVENT = "ASCENDED_EVENT";
        const TYPE_CAPTURE_POINT = "CAPTURE_POINT";
        const TYPE_PORO_KING_SUMMON = "PORO_KING_SUMMON";

        const WARD_TYPE_UNDEFINED = "UNDEFINED";
        const WARD_TYPE_YELLOW_TRINKET = "YELLOW_TRINKET";
        const WARD_TYPE_CONTROL_WARD = "CONTROL_WARD";
        const WARD_TYPE_SIGHT_WARD = "SIGHT_WARD";
        const WARD_TYPE_BLUE_TRINKET = "BLUE_TRINKET";
        const WARD_TYPE_TEEMO_MUSHROOM = "TEEMO_MUSHROOM";

        const MONSTER_SUBTYPE_AIR_DRAGON = "AIR_DRAGON";
        const MONSTER_SUBTYPE_EARTH_DRAGON = "EARTH_DRAGON";
        const MONSTER_SUBTYPE_FIRE_DRAGON = "FIRE_DRAGON";
        const MONSTER_SUBTYPE_WATER_DRAGON = "WATER_DRAGON";
        const MONSTER_SUBTYPE_ELDER_DRAGON = "ELDER_DRAGON";
        const MONSTER_SUBTYPE_RIFTHERALD = "RIFTHERALD";
        const MONSTER_SUBTYPE_BARON_NASHOR = "BARON_NASHOR";

        const TRANSFORM_TYPE_ASSASSIN = "ASSASSIN";
        const TRANSFORM_TYPE_SLAYER = "SLAYER";

        const BUILDING_TYPE_INHIBITOR_BUILDING = "INHIBITOR_BUILDING";
        const BUILDING_TYPE_TOWER_BUILDING = "TOWER_BUILDING";

        const TOWER_TYPE_NEXUS_TURRET = "NEXUS_TURRET";
        const TOWER_TYPE_BASE_TURRET = "BASE_TURRET";
        const TOWER_TYPE_INNER_TURRET = "INNER_TURRET";
        const TOWER_TYPE_OUTER_TURRET = "OUTER_TURRET";

        const LANE_TYPE_TOP_LANE = "TOP_LANE";
        const LANE_TYPE_MID_LANE = "MID_LANE";
        const LANE_TYPE_BOT_LANE = "BOT_LANE";

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
		/** @var string */
        public $transformType;
        /** @var string */
        public $name;

	}