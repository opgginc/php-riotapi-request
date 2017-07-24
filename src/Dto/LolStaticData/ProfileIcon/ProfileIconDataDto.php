<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:12
	 */

	namespace RiotQuest\Dto\LolStaticData\ProfileIcon;

	use RiotQuest\Dto\BaseDto;

	class ProfileIconDataDto extends BaseDto
	{
		/** @var ProfileIconDetailsDto[] */
		public $data;
		/** @var string */
		public $version;
		/** @var string */
		public $type;
	}