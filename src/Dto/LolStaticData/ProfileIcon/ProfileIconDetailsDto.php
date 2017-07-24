<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:13
	 */

	namespace RiotQuest\Dto\LolStaticData\ProfileIcon;

	use RiotQuest\Dto\BaseDto;

	class ProfileIconDetailsDto extends BaseDto
	{
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var double */
		public $id;
	}