<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:55
	 */

	namespace RiotQuest\Dto\LolStaticData;

	use RiotQuest\Dto\BaseDto;

	class ImageDto extends BaseDto
	{
		/** @var string */
		public $full;
		/** @var string */
		public $group;
		/** @var string */
		public $sprite;
		/** @var int */
		public $h;
		/** @var int */
		public $w;
		/** @var int */
		public $y;
		/** @var int */
		public $x;
	}