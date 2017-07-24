<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:19
	 */

	namespace RiotQuest\Dto\LolStaticData\SummonerSpell;

	use RiotQuest\Dto\BaseDto;

	class SummonerSpellListDto extends BaseDto
	{
		/** @var SummonerSpellDto[] */
		public $data;
		/** @var string */
		public $version;
		/** @var string */
		public $type;
	}