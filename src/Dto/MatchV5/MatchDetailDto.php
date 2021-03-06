<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Constant\QueueType;
	use RiotQuest\Dto\BaseDto;
    use RiotQuest\Exception\UnknownQueueIdException;

	/**
	 * Class MatchDto
	 * @package RiotQuest\Dto\Match
	 */
	class MatchDetailDto extends BaseDto
	{
        /** @var double */
        public $gameId;
        /** @var int */
        public $queueId;
        /** @var string */
        public $gameVersion;
        /** @var string */
        public $platformId;
        /** @var string */
        public $gameMode;
        /** @var string */
        public $gameType;
        /** @var int */
        public $mapId;
        /** @var string */
        public $gameName;
        /** @var int */
        protected $gameDuration;
        /** @var \RiotQuest\Dto\DateTime */
        public $gameCreation;
        /** @var \RiotQuest\Dto\DateTime */
        public $gameStartTimestamp;
        /** @var ParticipantDto[] */
        public $participants;
		/** @var TeamDto[] */
        public $teams;

        /**
         * gameDuration is protected
         * PHPDoc Tags @:param should not be used because of JsonMapper
         */
        public function setGameDuration($gameDuration) {
            $this->gameDuration = $gameDuration;
        }

        /**
         * [CAUTION] the unit of gameDuration has been changed.
         * (v4)seconds -> (v5)milliseconds
         *
         * @return int
         */
        public function getGameDurationOrigin() {
            return $this->gameDuration;
        }

        /**
         * Check the unit of the property, convert it if necessary, and return it.
         * convert milliseconds to seconds
         *
         * @return int|float
         */
        public function getGameDurationSecond() {
            $length = strlen((string)$this->gameDuration);
            // If the gameDuration exceeds 6 digits and the unit is not milliseconds, the minimum value of 100,000 seconds is about 27 hours or more.
            // It is highly likely that 6 digits or more are in milliseconds.
            if ($length >= 6) {
                return $this->gameDuration / 1000;
            }
            return $this->gameDuration;
        }

		/**
		 * There is no flag for remake in riotapi.
		 *
		 * @return bool
		 */
		public function isRemake() {
			return $this->getQueueType()->isTutorial() && $this->getGameDurationSecond() < 300;
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