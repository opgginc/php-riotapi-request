<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:08
	 */

	namespace RiotQuest\Dto\LolStaticData\Map;

	use RiotQuest\Dto\BaseDto;

	class MapDetailsDto extends BaseDto
	{
		/** @var string */
		public $mapName;
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var double */
		public $mapId;
		/** @var double[] */
		public $unpurchasableItemList;
	}