<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:20
	 */

	namespace RiotQuest\Dto\LolStaticData\SummonerSpell;

	use RiotQuest\Dto\BaseDto;

	class LevelTipDto extends BaseDto
	{
		/** @var string[] */
		public $effect;
		/** @var string[] */
		public $label;
	}