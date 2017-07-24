<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 20:18
	 */

	namespace RiotQuest\Dto\Runes;

	use RiotQuest\Dto\BaseDto;

	class RunePagesDto extends BaseDto
	{
		/** @var RunePageDto[]    Collection of rune pages associated with the summoner. */
		public $pages;
		/** @var double    Summoner ID. */
		public $summonerId;

	}