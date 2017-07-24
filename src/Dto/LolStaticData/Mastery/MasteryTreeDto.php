<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:10
	 */

	namespace RiotQuest\Dto\LolStaticData\Mastery;

	use RiotQuest\Dto\BaseDto;

	class MasteryTreeDto extends BaseDto
	{
		/** @var MasteryTreeListDto[] */
		public $Resolve;
		/** @var MasteryTreeListDto[] */
		public $Ferocity;
		/** @var MasteryTreeListDto[] */
		public $Cunning;
	}