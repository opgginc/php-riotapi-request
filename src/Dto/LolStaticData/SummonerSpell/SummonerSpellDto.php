<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:19
	 */

	namespace RiotQuest\Dto\LolStaticData\SummonerSpell;

	use RiotQuest\Dto\BaseDto;

	class SummonerSpellDto extends BaseDto
	{
		/** @var \RiotQuest\Dto\LolStaticData\SpellVarsDto[] */
		public $vars;
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var string */
		public $costBurn;
		/** @var double[] */
		public $cooldown;
		/** @var string[] */
		public $effectBurn;
		/** @var int */
		public $id;
		/** @var string */
		public $cooldownBurn;
		/** @var string */
		public $tooltip;
		/** @var int */
		public $maxrank;
		/** @var string */
		public $rangeBurn;
		/** @var string */
		public $description;
		/** @var \RiotQuest\Dto\LolStaticData\Effect[]    This field is a List of List of Double. */
		public $effect;
		/** @var string */
		public $key;
		/** @var LevelTipDto */
		public $leveltip;
		/** @var string[] */
		public $modes;
		/** @var string */
		public $resource;
		/** @var string */
		public $name;
		/** @var string */
		public $costType;
		/** @var string */
		public $sanitizedDescription;
		/** @var string */
		public $sanitizedTooltip;
		/** @var int[]    This field is either a List of Integer or the String 'self' for spells that target one's own champion. */
		public $range;
		/** @var int[] */
		public $cost;
		/** @var int */
		public $summonerLevel;
	}