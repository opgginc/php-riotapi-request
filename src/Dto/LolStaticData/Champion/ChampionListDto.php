<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:54
	 */

	namespace RiotQuest\Dto\LolStaticData\Champion;

	use RiotQuest\Dto\BaseDto;

	class ChampionListDto extends BaseDto
	{
		/** @var array */
		public $keys;
		/** @var ChampionDto[] */
		public $data;
		/** @var string */
		public $version;
		/** @var string */
		public $type;
		/** @var string */
		public $format;
	}