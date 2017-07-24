<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 11:44
	 */

	namespace RiotQuest\Dto\LolStaticData\Item;

	use RiotQuest\Dto\BaseDto;

	class ItemTreeDto extends BaseDto
	{
		/** @var string */
		public $header;
		/** @var string[] */
		public $tags;
	}