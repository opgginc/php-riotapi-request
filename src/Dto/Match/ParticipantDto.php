<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:24
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	class ParticipantDto extends BaseDto
	{
		/** @var ParticipantStatsDto */
		public $stats;
		/** @var int */
		public $participantId;
		/** @var RuneDto[] */
		public $runes;
		/** @var ParticipantTimelineDto */
		public $timeline;
		/** @var int */
		public $teamId;
		/** @var int */
		public $spell2Id;
		/** @var MasteryDto[] */
		public $masteries;
		/** @var string */
		public $highestAchievedSeasonTier;
		/** @var int */
		public $spell1Id;
		/** @var int */
		public $championId;

		/**
		 * @return MasteryDto|null
		 */
		public function getKeystoneMastery() {
			if (sizeof($this->masteries) === 0) {
				return null;
			}
			foreach ($this->masteries as $mastery) {
				if ($mastery->isKeystoneMastery()) {
					return $mastery;
				}
			}

			return null;
		}
	}