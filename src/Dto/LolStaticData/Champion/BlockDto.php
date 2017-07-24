<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:56
	 */

	namespace RiotQuest\Dto\LolStaticData\Champion;

	use RiotQuest\Dto\BaseDto;

	class BlockDto extends BaseDto
	{
		/** @var BlockItemDto[] */
		public $items;
		/** @var boolean */
		public $recMath;
		/** @var string */
		public $type;
	}