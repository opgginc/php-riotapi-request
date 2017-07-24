<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:12
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Constant\QueueType;
	use RiotQuest\Dto\BaseDto;
	use RiotQuest\Exception\UnknownQueueIdException;

	class MatchReferenceDto extends BaseDto
	{
		/** @var string */
		public $lane;
		/** @var double */
		public $gameId;
		/** @var int */
		public $champion;
		/** @var string */
		public $platformId;
		/** @var int */
		public $season;
		/** @var int */
		public $queue;
		/** @var string */
		public $role;
		/** @var \RiotQuest\Dto\DateTime */
		public $timestamp;

		public function getQueueType() {
			try {
				return QueueType::ById($this->queue);
			} catch (UnknownQueueIdException $e) {
				return new QueueType($this->queue, $this->queue);
			}
		}
	}