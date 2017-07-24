<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 20:17
	 */

	namespace RiotQuest\Dto\Masteries;

	use RiotQuest\Dto\BaseDto;

	class MasteryPageDto extends BaseDto
	{
		/** @var boolean    Indicates if the mastery page is the current mastery page. */
		public $current;
		/** @var MasteryDto[]    Collection of masteries associated with the mastery page. */
		public $masteries;
		/** @var string    Mastery page name. */
		public $name;
		/** @var double    Mastery page ID. */
		public $id;

	}