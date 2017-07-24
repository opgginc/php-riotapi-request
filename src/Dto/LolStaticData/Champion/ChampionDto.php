<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:54
	 */

	namespace RiotQuest\Dto\LolStaticData\Champion;

	use RiotQuest\Dto\BaseDto;

	class ChampionDto extends BaseDto
	{
		/** @var InfoDto */
		public $info;
		/** @var string[] */
		public $enemytips;
		/** @var StatsDto */
		public $stats;
		/** @var string */
		public $name;
		/** @var string */
		public $title;
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var string[] */
		public $tags;
		/** @var string */
		public $partype;
		/** @var SkinDto[] */
		public $skins;
		/** @var PassiveDto */
		public $passive;
		/** @var RecommendedDto[] */
		public $recommended;
		/** @var string[] */
		public $allytips;
		/** @var string */
		public $key;
		/** @var string */
		public $lore;
		/** @var int */
		public $id;
		/** @var string */
		public $blurb;
		/** @var ChampionSpellDto[] */
		public $spells;
	}