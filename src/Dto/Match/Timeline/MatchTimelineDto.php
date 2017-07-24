<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:32
	 */

	namespace RiotQuest\Dto\Match\Timeline;

	use RiotQuest\Dto\BaseDto;

	class MatchTimelineDto extends BaseDto
	{
		/** @var MatchFrameDto[] */
		public $frames;
		/** @var double */
		public $frameInterval;
	}