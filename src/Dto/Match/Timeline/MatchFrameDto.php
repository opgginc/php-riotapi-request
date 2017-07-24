<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:33
	 */

	namespace RiotQuest\Dto\Match\Timeline;

	use RiotQuest\Dto\BaseDto;

	class MatchFrameDto extends BaseDto
	{
		/** @var \RiotQuest\Dto\DateTime */
		public $timestamp;
		/** @var MatchParticipantFrameDto[] */
		public $participantFrames;
		/** @var MatchEventDto[] */
		public $events;
	}