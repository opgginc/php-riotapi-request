<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class FrameDto extends BaseDto
	{
		/** @var \RiotQuest\Dto\DateTime */
		public $timestamp;
		/** @var ParticipantFrameDto[] */
		public $participantFrames;
		/** @var EventDto[] */
		public $events;
	}