<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:18
	 */

	namespace RiotQuest\Dto\LolStaticData\Rune;

	use RiotQuest\Dto\BaseDto;

	class RuneDto extends BaseDto
	{
		/** @var RuneStatsDto */
		public $stats;
		/** @var string */
		public $name;
		/** @var string[] */
		public $tags;
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var string */
		public $sanitizedDescription;
		/** @var MetaDataDto */
		public $rune;
		/** @var int */
		public $id;
		/** @var string */
		public $description;
	}