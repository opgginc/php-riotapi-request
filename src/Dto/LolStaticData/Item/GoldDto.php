<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 11:45
	 */

	namespace RiotQuest\Dto\LolStaticData\Item;

	class GoldDto extends \RiotQuest\Dto\BaseDto
	{
		/** @var int */
		public $sell;
		/** @var int */
		public $total;
		/** @var int */
		public $base;
		/** @var boolean */
		public $purchasable;
	}