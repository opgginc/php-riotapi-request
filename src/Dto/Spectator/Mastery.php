<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:51
	 */

	namespace RiotQuest\Dto\Spectator;

	use RiotQuest\Dto\BaseDto;

	class Mastery extends BaseDto
	{
		/** @var double    The ID of the mastery */
		public $masteryId;
		/** @var int    The number of points put into this mastery by the user */
		public $rank;
	}