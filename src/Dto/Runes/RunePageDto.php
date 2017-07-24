<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 20:18
	 */

	namespace RiotQuest\Dto\Runes;

	use RiotQuest\Dto\BaseDto;

	class RunePageDto extends BaseDto
	{
		/** @var boolean    Indicates if the page is the current page. */
		public $current;
		/** @var RuneSlotDto[]    Collection of rune slots associated with the rune page. */
		public $slots;
		/** @var string    Rune page name. */
		public $name;
		/** @var double    Rune page ID. */
		public $id;
	}