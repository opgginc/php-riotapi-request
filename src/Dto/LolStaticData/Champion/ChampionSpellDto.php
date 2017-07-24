<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:56
	 */

	namespace RiotQuest\Dto\LolStaticData\Champion;

	use RiotQuest\Dto\BaseDto;

	class ChampionSpellDto extends BaseDto
	{
		/** @var string */
		public $cooldownBurn;
		/** @var string */
		public $resource;
		/** @var LevelTipDto */
		public $leveltip;
		/** @var \RiotQuest\Dto\LolStaticData\SpellVarsDto[] */
		public $vars;
		/** @var string */
		public $costType;
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var string */
		public $sanitizedDescription;
		/** @var string */
		public $sanitizedTooltip;
		/** @var \RiotQuest\Dto\LolStaticData\Effect[]    This field is a List of List of Double. */
		public $effect;
		/** @var string */
		public $tooltip;
		/** @var int */
		public $maxrank;
		/** @var string */
		public $costBurn;
		/** @var string */
		public $rangeBurn;
		/** @var integer[]    This field is either a List of Integer or the String 'self' for spells that target one's own champion. */
		public $range;
		/** @var double[] */
		public $cooldown;
		/** @var int[] */
		public $cost;
		/** @var string */
		public $key;
		/** @var string */
		public $description;
		/** @var string[] */
		public $effectBurn;
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto[] */
		public $altimages;
		/** @var string */
		public $name;
	}