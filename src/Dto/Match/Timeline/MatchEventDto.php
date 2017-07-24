<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:35
	 */

	namespace RiotQuest\Dto\Match\Timeline;

	use RiotQuest\Dto\BaseDto;

	/**
	 * # Old -> New
	 * "eventType": "ITEM_PURCHASED" => "type": "ITEM_PURCHASED"
	 * "itemAfter": 3340             => "afterId": 3340
	 * "itemBefore": 3340            => "beforeId": 3340
	 *
	 * Class MatchEventDto
	 * @package RiotQuest\Dto\Match\Timeline
	 */
	class MatchEventDto extends BaseDto
	{
		const TYPE_CHAMPION_KILL = "CHAMPION_KILL";
		const TYPE_WARD_PLACED = "WARD_PLACED";
		const TYPE_WARD_KILL = "WARD_KILL";
		const TYPE_BUILDING_KILL = "BUILDING_KILL";
		const TYPE_ELITE_MONSTER_KILL = "ELITE_MONSTER_KILL";
		const TYPE_ITEM_PURCHASED = "ITEM_PURCHASED";
		const TYPE_ITEM_SOLD = "ITEM_SOLD";
		const TYPE_ITEM_DESTROYED = "ITEM_DESTROYED";
		const TYPE_ITEM_UNDO = "ITEM_UNDO";
		const TYPE_SKILL_LEVEL_UP = "SKILL_LEVEL_UP";
		const TYPE_ASCENDED_EVENT = "ASCENDED_EVENT";
		const TYPE_CAPTURE_POINT = "CAPTURE_POINT";
		const TYPE_PORO_KING_SUMMON = "PORO_KING_SUMMON";

		/** @var string */
		public $eventType;
		/** @var string */
		public $towerType;
		/** @var int */
		public $teamId;
		/** @var string */
		public $ascendedType;
		/** @var int */
		public $killerId;
		/** @var string */
		public $levelUpType;
		/** @var string */
		public $pointCaptured;
		/** @var int[] */
		public $assistingParticipantIds;
		/** @var string */
		public $wardType;
		/** @var string */
		public $monsterType;
		/** @var string    (Legal values: CHAMPION_KILL, WARD_PLACED, WARD_KILL, BUILDING_KILL, ELITE_MONSTER_KILL, ITEM_PURCHASED, ITEM_SOLD, ITEM_DESTROYED, ITEM_UNDO, SKILL_LEVEL_UP, ASCENDED_EVENT, CAPTURE_POINT, PORO_KING_SUMMON) */
		public $type;
		/** @var int */
		public $skillSlot;
		/** @var int */
		public $victimId;
		/** @var \RiotQuest\Dto\DateTime */
		public $timestamp;
		/** @var int */
		public $afterId;
		/** @var string */
		public $monsterSubType;
		/** @var string */
		public $laneType;
		/** @var int */
		public $itemId;
		/** @var int */
		public $participantId;
		/** @var string */
		public $buildingType;
		/** @var int */
		public $creatorId;
		/** @var MatchPositionDto */
		public $position;
		/** @var int */
		public $beforeId;
	}