<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 11:44
	 */

	namespace RiotQuest\Dto\LolStaticData\Item;

	use RiotQuest\Dto\BaseDto;

	class ItemDto extends BaseDto
	{
		/** @var GoldDto */
		public $gold;
		/** @var string */
		public $plaintext;
		/** @var boolean */
		public $hideFromAll;
		/** @var boolean */
		public $inStore;
		/** @var string[] */
		public $into;
		/** @var int */
		public $id;
		/** @var InventoryDataStatsDto */
		public $stats;
		/** @var string */
		public $colloq;
		/** @var boolean[] */
		public $maps;
		/** @var int */
		public $specialRecipe;
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var string */
		public $description;
		/** @var string[] */
		public $tags;
		/** @var string[] */
		public $effect;
		/** @var string */
		public $requiredChampion;
		/** @var string[] */
		public $from;
		/** @var string */
		public $group;
		/** @var boolean */
		public $consumeOnFull;
		/** @var string */
		public $name;
		/** @var boolean */
		public $consumed;
		/** @var string */
		public $sanitizedDescription;
		/** @var int */
		public $depth;
		/** @var int */
		public $stacks;
	}