<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:34
	 */

	namespace RiotQuest\Dto\Match\Timeline;

	use RiotQuest\Dto\BaseDto;

	class MatchParticipantFrameDto extends BaseDto
	{
		/** @var int */
		public $totalGold;
		/** @var int */
		public $teamScore;
		/** @var int */
		public $participantId;
		/** @var int */
		public $level;
		/** @var int */
		public $currentGold;
		/** @var int */
		public $minionsKilled;
		/** @var int */
		public $dominionScore;
		/** @var MatchPositionDto */
		public $position;
		/** @var int */
		public $xp;
		/** @var int */
		public $jungleMinionsKilled;
	}