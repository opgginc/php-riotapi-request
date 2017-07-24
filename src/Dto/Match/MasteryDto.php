<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:28
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	class MasteryDto extends BaseDto
	{
		/** @var int */
		public $masteryId;
		/** @var int */
		public $rank;

		/**
		 * @return bool
		 */
		public function isKeystoneMastery() {
			return static::isKeystoneMasteryById($this->masteryId);
		}

		/**
		 * @param $masteryId
		 *
		 * @return bool
		 */
		public static function isKeystoneMasteryById($masteryId) {
			$keystoneMasteryIdList = [
				6161, 6162, 6164,
				6361, 6362, 6363,
				6261, 6262, 6263
			];
			if (@in_array((int)$masteryId, $keystoneMasteryIdList, true)) {
				return true;
			}
			return false;
		}
	}