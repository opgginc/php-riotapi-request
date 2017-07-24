<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 11:44
	 */

	namespace RiotQuest\Dto\LolStaticData\Item;

	use RiotQuest\Dto\BaseDto;

	class ItemListDto extends BaseDto
	{
		/** @var ItemDto[] */
		public $data;
		/** @var string */
		public $version;
		/** @var ItemTreeDto[] */
		public $tree;
		/** @var GroupDto[] */
		public $groups;
		/** @var string */
		public $type;
	}