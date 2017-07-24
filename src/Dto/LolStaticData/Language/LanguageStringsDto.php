<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:05
	 */

	namespace RiotQuest\Dto\LolStaticData\Language;

	use RiotQuest\Dto\BaseDto;

	class LanguageStringsDto extends BaseDto
	{
		/** @var string[] */
		public $data;
		/** @var string */
		public $version;
		/** @var string */
		public $type;
	}