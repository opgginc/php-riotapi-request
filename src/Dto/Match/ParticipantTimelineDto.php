<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:26
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	/**
	 * # Old => New
	 * creepsPerMinDeltas.zeroToTen: 5.6       => creepsPerMinDeltas.0-10: 5.6
	 * creepsPerMinDeltas.tenToTwenty: 3.5     => creepsPerMinDeltas.10-20: 3.5
	 * creepsPerMinDeltas.twentyToThirty: 3.2  => creepsPerMinDeltas.20-30: 3.2
	 * creepsPerMinDeltas.thirtyToEnd: 2.6     => creepsPerMinDeltas.30-end: 2.6
	 *
	 * Class ParticipantTimelineDto
	 * @package RiotQuest\Dto\Match
	 */
	class ParticipantTimelineDto extends BaseDto
	{
		/** @var string */
		public $lane;
		/** @var int */
		public $participantId;
		/** @var array */
		public $csDiffPerMinDeltas;
		/** @var array */
		public $goldPerMinDeltas;
		/** @var array */
		public $xpDiffPerMinDeltas;
		/** @var array */
		public $creepsPerMinDeltas;
		/** @var array */
		public $xpPerMinDeltas;
		/** @var string */
		public $role;
		/** @var array */
		public $damageTakenDiffPerMinDeltas;
		/** @var array */
		public $damageTakenPerMinDeltas;
	}