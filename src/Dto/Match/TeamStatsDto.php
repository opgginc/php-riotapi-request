<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:23
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	class TeamStatsDto extends BaseDto
	{
		/** @var boolean */
		public $firstDragon;
		/** @var boolean */
		public $firstInhibitor;
		/** @var TeamBansDto[] */
		public $bans;
		/** @var int */
		public $baronKills;
		/** @var boolean */
		public $firstRiftHerald;
		/** @var boolean */
		public $firstBaron;
		/** @var int */
		public $riftHeraldKills;
		/** @var boolean */
		public $firstBlood;
		/** @var int */
		public $teamId;
		/** @var boolean */
		public $firstTower;
		/** @var int */
		public $vilemawKills;
		/** @var int */
		public $inhibitorKills;
		/** @var int */
		public $towerKills;
		/** @var int */
		public $dominionVictoryScore;
		/** @var string "Win", "Fail" */
		public $win;
		/** @var int */
		public $dragonKills;

		public function isWin() {
			return $this->win === 'Win';
		}

		public function isLose() {
			return $this->win === 'Fail';
		}
	}