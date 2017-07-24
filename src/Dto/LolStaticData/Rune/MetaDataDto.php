<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:18
	 */

	namespace RiotQuest\Dto\LolStaticData\Rune;

	use RiotQuest\Dto\BaseDto;

	class MetaDataDto extends BaseDto
	{
		/** @var string */
		public $tier;
		/** @var string */
		public $type;
		/** @var boolean */
		public $isRune;
	}