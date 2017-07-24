<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:25
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	/**
	 * # Old => New
	 * "magicDamageTaken": 11090, => "magicalDamageTaken": 11090,
	 * "minionsKilled": 136,      => "totalMinionsKilled": 136,
	 * "towerKills": 0,           => "turretKills": 0,
	 * "winner": false            => "win": false
	 *
	 * Class ParticipantStatsDto
	 * @package RiotQuest\Dto\Match
	 */
	class ParticipantStatsDto extends BaseDto
	{
		/** @var double */
		public $physicalDamageDealt;
		/** @var int */
		public $neutralMinionsKilledTeamJungle;
		/** @var double */
		public $magicDamageDealt;
		/** @var int */
		public $totalPlayerScore;
		/** @var int */
		public $deaths;
		/** @var boolean */
		public $win;
		/** @var int */
		public $neutralMinionsKilledEnemyJungle;
		/** @var int */
		public $altarsCaptured;
		/** @var int */
		public $largestCriticalStrike;
		/** @var double */
		public $totalDamageDealt;
		/** @var double */
		public $magicDamageDealtToChampions;
		/** @var int */
		public $visionWardsBoughtInGame;
		/** @var double */
		public $damageDealtToObjectives;
		/** @var int */
		public $largestKillingSpree;
		/** @var int */
		public $item1;
		/** @var int */
		public $quadraKills;
		/** @var int */
		public $teamObjective;
		/** @var int */
		public $totalTimeCrowdControlDealt;
		/** @var int */
		public $doubleestTimeSpentLiving;
		/** @var int */
		public $wardsKilled;
		/** @var boolean */
		public $firstTowerAssist;
		/** @var boolean */
		public $firstTowerKill;
		/** @var int */
		public $item2;
		/** @var int */
		public $item3;
		/** @var int */
		public $item0;
		/** @var boolean */
		public $firstBloodAssist;
		/** @var double */
		public $visionScore;
		/** @var int */
		public $wardsPlaced;
		/** @var int */
		public $item4;
		/** @var int */
		public $item5;
		/** @var int */
		public $item6;
		/** @var int */
		public $turretKills;
		/** @var int */
		public $tripleKills;
		/** @var double */
		public $damageSelfMitigated;
		/** @var int */
		public $champLevel;
		/** @var int */
		public $nodeNeutralizeAssist;
		/** @var boolean */
		public $firstInhibitorKill;
		/** @var int */
		public $goldEarned;
		/** @var double */
		public $magicalDamageTaken;
		/** @var int */
		public $kills;
		/** @var int */
		public $doubleKills;
		/** @var int */
		public $nodeCaptureAssist;
		/** @var double */
		public $trueDamageTaken;
		/** @var int */
		public $nodeNeutralize;
		/** @var boolean */
		public $firstInhibitorAssist;
		/** @var int */
		public $assists;
		/** @var int */
		public $unrealKills;
		/** @var int */
		public $neutralMinionsKilled;
		/** @var int */
		public $objectivePlayerScore;
		/** @var int */
		public $combatPlayerScore;
		/** @var double */
		public $damageDealtToTurrets;
		/** @var int */
		public $altarsNeutralized;
		/** @var double */
		public $physicalDamageDealtToChampions;
		/** @var int */
		public $goldSpent;
		/** @var double */
		public $trueDamageDealt;
		/** @var double */
		public $trueDamageDealtToChampions;
		/** @var int */
		public $participantId;
		/** @var int */
		public $pentaKills;
		/** @var double */
		public $totalHeal;
		/** @var int */
		public $totalMinionsKilled;
		/** @var boolean */
		public $firstBloodKill;
		/** @var int */
		public $nodeCapture;
		/** @var int */
		public $largestMultiKill;
		/** @var int */
		public $sightWardsBoughtInGame;
		/** @var double */
		public $totalDamageDealtToChampions;
		/** @var int */
		public $totalUnitsHealed;
		/** @var int */
		public $inhibitorKills;
		/** @var int */
		public $totalScoreRank;
		/** @var double */
		public $totalDamageTaken;
		/** @var int */
		public $killingSprees;
		/** @var double */
		public $timeCCingOthers;
		/** @var double */
		public $physicalDamageTaken;
	}