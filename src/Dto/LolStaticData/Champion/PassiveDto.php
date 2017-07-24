<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:55
	 */

	namespace RiotQuest\Dto\LolStaticData\Champion;

	use RiotQuest\Dto\BaseDto;

	class PassiveDto extends BaseDto
	{
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var string */
		public $sanitizedDescription;
		/** @var string */
		public $name;
		/** @var string */
		public $description;
	}