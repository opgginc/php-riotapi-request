<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:11
	 */

	namespace RiotQuest\Dto\LolStaticData\Mastery;

	use RiotQuest\Dto\BaseDto;

	class MasteryTreeListDto extends BaseDto
	{
		/** @var MasteryTreeItemDto[] */
		public $masteryTreeItems;
	}