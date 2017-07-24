<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:52
	 */

	namespace RiotQuest\Dto\Spectator;

	use RiotQuest\Constant\QueueType;
	use RiotQuest\Dto\BaseDto;
	use RiotQuest\Exception\UnknownQueueIdException;

	class FeaturedGameInfo extends BaseDto
	{
		/** @var double    The ID of the game */
		public $gameId;
		/** @var \RiotQuest\Dto\DateTime    The game start time represented in epoch milliseconds */
		public $gameStartTime;
		/** @var string    The ID of the platform on which the game is being played */
		public $platformId;
		/** @var string    The game mode */
		public $gameMode;
		/** @var double    The ID of the map */
		public $mapId;
		/** @var string    The game type */
		public $gameType;
		/** @var BannedChampion[]    Banned champion information */
		public $bannedChampions;
		/** @var Observer    The observer information */
		public $observers;
		/** @var Participant[]    The participant information */
		public $participants;
		/** @var double    The amount of time in seconds that has passed since the game started */
		public $gameLength;
		/** @var double    The queue type (queue types are documented on the Game Constants page) */
		public $gameQueueConfigId;

		public function getQueueType() {
			try {
				return QueueType::ById($this->gameQueueConfigId);
			} catch (UnknownQueueIdException $e) {
				return new QueueType($this->gameQueueConfigId, $this->gameQueueConfigId);
			}
		}
	}