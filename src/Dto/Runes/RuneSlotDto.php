<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 20:18
	 */

	namespace RiotQuest\Dto\Runes;

	use RiotQuest\Dto\BaseDto;

	class RuneSlotDto extends BaseDto
	{
		/** @var int    Rune slot ID. */
		public $runeSlotId;
		/** @var int    Rune ID associated with the rune slot. For static information correlating to rune IDs, please refer to the LoL Static Data API. */
		public $runeId;
	}