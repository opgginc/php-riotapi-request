<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 03:32
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Constant\QueueType;
	use RiotQuest\Dto\BaseDto;
	use RiotQuest\Exception\UnknownQueueIdException;

	/**
	 * # Old => New
	 * "matchCreation": 1454028303878,  => "gameCreation": 1454028303878,
	 * "matchDuration": 2176,           => "gameDuration": 2176,
	 * "matchId": 2275813950,           => "gameId": 2275813950,
	 * "matchMode": "CLASSIC",          => "gameMode": "CLASSIC",
	 * "matchType": "MATCHED_GAME",     => "gameType": "MATCHED_GAME",
	 * "matchVersion": "6.2.0.238",     => "gameVersion": "6.2.0.238",
	 *
	 * Class MatchDto
	 * @package RiotQuest\Dto\Match
	 */
	class MatchDto extends BaseDto
	{

		/** @var int */
		public $seasonId;

		/** @var int */
		public $queueId;

		/** @var double */
		public $gameId;

		/** @var ParticipantIdentityDto[] */
		public $participantIdentities;

		/** @var string */
		public $gameVersion;

		/** @var string */
		public $platformId;

		/** @var string */
		public $gameMode;

		/** @var int */
		public $mapId;

		/** @var string */
		public $gameType;

		/** @var TeamStatsDto[] */
		public $teams;

		/** @var ParticipantDto[] */
		public $participants;

		/** @var double */
		public $gameDuration;

		/** @var \RiotQuest\Dto\DateTime */
		public $gameCreation;

		/**
		 * There is no flag for remake in riotapi.
		 *
		 * @return bool
		 */
		public function isRemake() {
			return $this->queueId != QueueType::UNKNOWN_2000 && $this->gameDuration < 210;
		}

		/**
		 * @return QueueType
		 */
		public function getQueueType() {
			try {
				return QueueType::ById($this->queueId);
			} catch (UnknownQueueIdException $e) {
				return new QueueType($this->queueId, $this->queueId);
			}
		}
	}