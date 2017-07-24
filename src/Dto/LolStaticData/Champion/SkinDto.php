<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:55
	 */

	namespace RiotQuest\Dto\LolStaticData\Champion;

	use RiotQuest\Dto\BaseDto;

	class SkinDto extends BaseDto
	{
		/** @var int */
		public $num;
		/** @var string */
		public $name;
		/** @var int */
		public $id;
	}