<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 20:16
	 */

	namespace RiotQuest\Dto\Masteries;

	use RiotQuest\Dto\BaseDto;

	class MasteryPagesDto extends BaseDto
	{
		/** @var MasteryPageDto[]    Collection of mastery pages associated with the summoner. */
		public $pages;
		/** @var double    Summoner ID. */
		public $summonerId;

	}