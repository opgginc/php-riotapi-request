<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 02:25
	 */

	namespace RiotQuest\Dto\Summoner;

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
		    // 참고 : https://ko.wikipedia.org/wiki/%CE%A3
            // mb_strtolower의 경우 대소문자 구분이 있는 특수문자 까지도 소문자로 변환하고 있어
            // 검색하고자 하는 유저명이 다르게 변환되는 사례가 발생하여 mb_strtolower가 아닌 strtolower를 사용하고 이후 UTF-8로 환 처리함
            // Σ -> σ
			return trim(str_replace([
				                        ' ', '/', "\t", "\r", "\n", // Riot policy
				                        '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '=', '-', '.', ',', '<', '>', '?', '\'', ';', '[', ']', '{', '}', '`', '\\' // invalid strings
			                        ], '', mb_convert_encoding(mb_strtolower($summonerName), "UTF-8")));
		}

		/**
		 * @return string
		 */
		public function getInternalName() {
			return static::InternalName($this->name);
		}
	}