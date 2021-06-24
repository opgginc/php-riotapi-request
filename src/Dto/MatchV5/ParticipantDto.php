<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class ParticipantDto extends BaseDto
	{
		/** @var int */
		public $participantId;
		/** @var int */
		public $teamId;
        /** @var int */
        public $assists;
        /** @var int */
        public $baronKills;
        /** @var int */
        public $bountyLevel;
        /** @var int */
        public $champExperience;
        /** @var int */
        public $championId;
        /** @var string */
        public $championName;
        /** @var int */
        public $championTransform;
        /** @var int */
        public $champLevel;
        /** @var int */
        public $consumablesPurchased;
        /** @var int */
        public $damageDealtToBuildings;
        /** @var int */
        public $damageDealtToObjectives;
        /** @var int */
        public $damageDealtToTurrets;
        /** @var int */
        public $damageSelfMitigated;
        /** @var int */
        public $deaths;
        /** @var int */
        public $detectorWardsPlaced;
        /** @var int */
        public $doubleKills;
        /** @var int */
        public $dragonKills;
        /** @var boolean */
        public $firstBloodAssist;
        /** @var boolean */
        public $firstBloodKill;
        /** @var boolean */
        public $firstTowerAssist;
        /** @var boolean */
        public $firstTowerKill;
        /** @var boolean */
        public $gameEndedInEarlySurrender;
        /** @var boolean */
        public $gameEndedInSurrender;
        /** @var int */
        public $goldEarned;
        /** @var int */
        public $goldSpent;
        /** @var string */
        public $individualPosition;
        /** @var int */
        public $inhibitorKills;
        /** @var int */
        public $inhibitorsLost;
        /** @var int */
        public $item0;
        /** @var int */
        public $item1;
        /** @var int */
        public $item2;
        /** @var int */
        public $item3;
        /** @var int */
        public $item4;
        /** @var int */
        public $item5;
        /** @var int */
        public $item6;
        /** @var int */
        public $itemsPurchased;
        /** @var int */
        public $killingSprees;
        /** @var int */
        public $kills;
        /** @var string */
        public $lane;
        /** @var int */
        public $largestCriticalStrike;
        /** @var int */
        public $largestKillingSpree;
        /** @var int */
        public $largestMultiKill;
        /** @var int */
        public $longestTimeSpentLiving;
        /** @var int */
        public $magicDamageDealt;
        /** @var int */
        public $magicDamageDealtToChampions;
        /** @var int */
        public $magicDamageTaken;
        /** @var int */
        public $neutralMinionsKilled;
        /** @var int */
        public $nexusKills;
        /** @var int */
        public $nexusLost;
        /** @var int */
        public $objectivesStolen;
        /** @var int */
        public $objectivesStolenAssists;
        /** @var int */
        public $pentaKills;
        /** @var int */
        public $physicalDamageDealt;
        /** @var int */
        public $physicalDamageDealtToChampions;
        /** @var int */
        public $physicalDamageTaken;
        /** @var int */
        public $profileIcon;
        /** @var string */
        public $puuid;
        /** @var int */
        public $quadraKills;
        /** @var string */
        public $riotIdName;
        /** @var string */
        public $riotIdTagline;
        /** @var string */
        public $role;
        /** @var int */
        public $sightWardsBoughtInGame;
        /** @var int */
        public $spell1Casts;
        /** @var int */
        public $spell2Casts;
        /** @var int */
        public $spell3Casts;
        /** @var int */
        public $spell4Casts;
        /** @var int */
        public $summoner1Casts;
        /** @var int */
        public $summoner1Id;
        /** @var int */
        public $summoner2Casts;
        /** @var int */
        public $summoner2Id;
        /** @var string */
        public $summonerId;
        /** @var int */
        public $summonerLevel;
        /** @var string */
        public $summonerName;
        /** @var boolean */
        public $teamEarlySurrendered;
        /** @var string */
        public $teamPosition;
        /** @var int */
        public $timeCCingOthers;
        /** @var int */
        public $timePlayed;
        /** @var int */
        public $totalDamageDealt;
        /** @var int */
        public $totalDamageDealtToChampions;
        /** @var int */
        public $totalDamageShieldedOnTeammates;
        /** @var int */
        public $totalDamageTaken;
        /** @var int */
        public $totalHeal;
        /** @var int */
        public $totalHealsOnTeammates;
        /** @var int */
        public $totalMinionsKilled;
        /** @var int */
        public $totalTimeCCDealt;
        /** @var int */
        public $totalTimeSpentDead;
        /** @var int */
        public $totalUnitsHealed;
        /** @var int */
        public $tripleKills;
        /** @var int */
        public $trueDamageDealt;
        /** @var int */
        public $trueDamageDealtToChampions;
        /** @var int */
        public $trueDamageTaken;
        /** @var int */
        public $turretKills;
        /** @var int */
        public $turretsLost;
        /** @var int */
        public $unrealKills;
        /** @var int */
        public $visionScore;
        /** @var int */
        public $visionWardsBoughtInGame;
        /** @var int */
        public $wardsKilled;
        /** @var int */
        public $wardsPlaced;
        /** @var boolean */
        public $win;
        /** @var PerksDto */
        public $perks;

        public function isBot() {
            return (boolean)($this->puuid === 'BOT');
        }
	}