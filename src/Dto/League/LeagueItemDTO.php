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
		/** @var boolean */
		public $hotStreak;
		/** @var MiniSeriesDTO */
		public $miniSeries;
		/** @var int */
		public $wins;
		/** @var boolean */
		public $veteran;
		/** @var int */
		public $losses;
		/** @var string */
		public $playerOrTeamId;
		/** @var string */
		public $playerOrTeamName;
		/** @var boolean */
		public $inactive;
		/** @var boolean */
		public $freshBlood;
		/** @var int */
		public $leaguePoints;
	}