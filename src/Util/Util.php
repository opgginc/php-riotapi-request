<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-25
	 * Time: 19:56
	 */

	namespace RiotQuest\Util;

	use RiotQuest\Dto\Summoner\SummonerDto;

	class Util
	{
		/**
		 * 소환사명을 internalName 으로 변경. 소문자 / 공백제거 등
		 *
		 * @param $summonerName
		 *
		 * @return mixed
		 */
		public static function getNormalizedSummonerName($summonerName) {
			return SummonerDto::InternalName($summonerName);
		}
	}