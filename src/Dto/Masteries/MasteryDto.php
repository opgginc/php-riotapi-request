<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 20:17
	 */

	namespace RiotQuest\Dto\Masteries;

	use RiotQuest\Dto\BaseDto;

	class MasteryDto extends BaseDto
	{
		/** @var int    Mastery ID. For static information correlating to masteries, please refer to the LoL Static Data API. */
		public $id;
		/** @var int    Mastery rank (i.e., the number of points put into this mastery). */
		public $rank;
	}