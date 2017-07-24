<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:51
	 */

	namespace RiotQuest\Dto\Spectator;

	use RiotQuest\Dto\BaseDto;

	class Rune extends BaseDto
	{
		/** @var  int    The count of this rune used by the participant */
		public $count;
		/** @var  double    The ID of the rune */
		public $runeId;
	}