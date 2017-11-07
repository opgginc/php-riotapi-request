<?php

	namespace RiotQuest\Dto\LolStaticData\Perk;

	use RiotQuest\Dto\BaseDto;

	class PerkListDto extends BaseDto
	{
		/** @var PerkDto[] */
		public $data;
		/** @var string */
		public $version;
		/** @var string */
		public $type;
	}