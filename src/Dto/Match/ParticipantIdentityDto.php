<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:23
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	class ParticipantIdentityDto extends BaseDto
	{
		/** @var PlayerDto */
		public $player;
		/** @var int */
		public $participantId;
	}