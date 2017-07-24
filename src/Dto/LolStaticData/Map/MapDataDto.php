<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:08
	 */

	namespace RiotQuest\Dto\LolStaticData\Map;

	use RiotQuest\Dto\BaseDto;

	class MapDataDto extends BaseDto
	{
		/** @var MapDetailsDto[] */
		public $data;
		/** @var string */
		public $version;
		/** @var string */
		public $type;
	}