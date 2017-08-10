<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 02:25
	 */

	namespace RiotQuest\Dto\Summoner;

	use RiotQuest\Dto\BaseDto;

	class SummonerDto extends BaseDto
	{
		/** @var int */
		public $profileIconId; // ID of the summoner icon associated with the summoner.

		/** @var string */
		public $name; // Summoner name.

		/** @var double */
		public $summonerLevel; // Summoner level associated with the summoner.

		/** @var \RiotQuest\Dto\DateTime */
		public $revisionDate; // Date summoner was last modified specified as epoch milliseconds. The following events will update this timestamp: profile icon change, playing the tutorial or advanced tutorial, finishing a game, summoner name change

		/** @var double */
		public $id; // Summoner ID.

		/** @var double */
		public $accountId; // Account ID.

		/**
		 * @param $summonerName
		 *
		 * @return string
		 */
		public static function InternalName($summonerName) {
			return trim(str_replace([
				                   ' ', '/', "\t", "\r", "\n", // Riot policy
				                   '{', '}', '?', ':', '+', '.', '-', '=', '_', '\\' // invalid strings
			                   ], '', mb_strtolower($summonerName, 'UTF-8')));
		}

		/**
		 * @return string
		 */
		public function getInternalName() {
			return static::InternalName($this->name);
		}
	}