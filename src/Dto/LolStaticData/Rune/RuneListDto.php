<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:15
	 */

	namespace RiotQuest\Dto\LolStaticData\Rune;

	use RiotQuest\Dto\BaseDto;

	class RuneListDto extends BaseDto
	{
		/** @var RuneDto[] */
		public $data;
		/** @var string */
		public $version;
		/** @var string */
		public $type;
	}