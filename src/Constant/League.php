<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:37
	 */

	namespace RiotQuest\Constant;

	class League
	{
		const QUEUE_RANKED_SOLO = 'RANKED_SOLO_5x5';
		const QUEUE_RANKED_FLEX_SR = 'RANKED_FLEX_SR';
		const QUEUE_RANKED_FLEX_TT = 'RANKED_FLEX_TT';
		const QUEUE_RANKED_TFT = 'RANKED_TFT';

		// Previous season 6
		const RANKED_TEAM_3x3 = 'RANKED_TEAM_3x3';
		const RANKED_TEAM_5x5 = 'RANKED_TEAM_5x5';

		const LEAGUE_TYPE_SUMMONER = 1;
		const LEAGUE_TYPE_TEAM = 2;

		/**
		 * @param $queueName
		 *
		 * @return int|null
		 */
		public static function getLeagueType($queueName) {
			switch($queueName) {
				case static::QUEUE_RANKED_SOLO:
				case static::QUEUE_RANKED_FLEX_SR:
				case static::QUEUE_RANKED_FLEX_TT:
					return static::LEAGUE_TYPE_SUMMONER;

				case static::RANKED_TEAM_3x3:
				case static::RANKED_TEAM_5x5:
					return static::LEAGUE_TYPE_TEAM;
			}

			return null;
		}
	}