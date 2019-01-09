<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 02:25
	 */

	namespace RiotQuest\Dto\SummonerV4;

	use RiotQuest\Dto\BaseDto;

	/**
	 * The API uses 3 types of IDs for players: summoner IDs, account IDs, and PUUIDs.
	 *
	 * Different APIs use different ID types, and you should use whichever type is required by the API you are using.
	 * Summoner and account IDs are only unique per region, and PUUIDs are unique globally.
	 *
	 * As of API v4, all IDs are encrypted using encryption keys unique to each project.
	 * An ID obtained with your dev key will not work with your production key (and vice versa).
	 *
	 * The max length for encrypted accountIds is 56 characters.
	 * The max length for encrypted summonerIds is 63 characters.
	 * The length for encrypted puuids should always be exactly 78 characters.
	 *
	 * Class SummonerDto
	 * @package RiotQuest\Dto\SummonerV4
	 */
	class SummonerDto extends BaseDto
	{
		/** @var int */
		public $profileIconId; // ID of the summoner icon associated with the summoner.

		/** @var string */
		public $name; // Summoner name.

		/** @var string */
		public $puuid; // PUUID.

		/** @var double */
		public $summonerLevel; // Summoner level associated with the summoner.

		/** @var \RiotQuest\Dto\DateTime */
		public $revisionDate; // Date summoner was last modified specified as epoch milliseconds. The following events will update this timestamp: profile icon change, playing the tutorial or advanced tutorial, finishing a game, summoner name change

		/** @var string */
		public $id; // Encrypted Summoner ID.

		/** @var string */
		public $accountId; // Encrypted Account ID.

		/**
		 * @param $summonerName
		 *
		 * @return string
		 */
		public static function InternalName($summonerName) {
			return trim(str_replace([
				                        ' ', '/', "\t", "\r", "\n", // Riot policy
				                        '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '=', '-', '.', ',', '<', '>', '?', '\'', ';', '[', ']', '{', '}', '`', '\\' // invalid strings
			                        ], '', mb_strtolower($summonerName, 'UTF-8')));
		}

		/**
		 * @return string
		 */
		public function getInternalName() {
			return static::InternalName($this->name);
		}
	}