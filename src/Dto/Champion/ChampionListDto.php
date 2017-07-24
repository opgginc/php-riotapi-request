<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:20
	 */

	namespace RiotQuest\Dto\Champion;

	use RiotQuest\Dto\BaseDto;

	class ChampionListDto extends BaseDto
	{
		/** @var ChampionDto[] The collection of champion information. */
		public $champions;
	}