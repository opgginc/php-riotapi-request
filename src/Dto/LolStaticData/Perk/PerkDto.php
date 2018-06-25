<?php

	namespace RiotQuest\Dto\LolStaticData\Perk;

	use RiotQuest\Dto\BaseDto;

	class PerkDto extends BaseDto
	{
		/** @var int */
		public $id;
		/** @var string */
		public $key;
		/** @var string */
		public $name;
		/** @var string */
		public $shortDesc;
		/** @var string */
		public $longDesc;
		/** @var string */
		public $icon;
		/** @var int */
		public $runePathId;
		/** @var string */
		public $runePathName;
	}