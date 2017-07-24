<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:10
	 */

	namespace RiotQuest\Dto\LolStaticData\Mastery;

	use RiotQuest\Dto\BaseDto;

	class MasteryListDto extends BaseDto
	{
		/** @var MasteryDto[] */
		public $data;
		/** @var string */
		public $version;
		/** @var MasteryTreeDto */
		public $tree;
		/** @var string */
		public $type;
	}