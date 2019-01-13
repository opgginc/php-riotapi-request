<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:06
	 */

	namespace RiotQuest\Dto\League;

	use RiotQuest\Dto\BaseDto;

	class LeagueItemDTO extends BaseDto
	{
		/** @var string */
		public $rank;
		/** @var int */
		public $wins;
		/** @var int */
		public $leaguePoints;
		/** @var string */
		public $summonerId;
		/** @var string */
		public $summonerName;

		// I can't see these attrs in v4.. maybe bugs
		/** @var boolean */
		public $inactive;
		/** @var boolean */
		public $hotStreak;
		/** @var MiniSeriesDTO */
		public $miniSeries;
		/** @var boolean */
		public $veteran;
		/** @var int */
		public $losses;
		/** @var boolean */
		public $freshBlood;

		/** @deprecated @var string */
		public $playerOrTeamName;
		/** @deprecated @var string */
		public $playerOrTeamId;
	}