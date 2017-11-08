<?php

	namespace RiotQuest\Dto\LolStaticData\Perk;

	use RiotQuest\Dto\BaseDto;

	class PerkDto extends BaseDto
	{
		/** @var string */
		public $name;
		/** @var string[] */
		public $tags;
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var string */
		public $sanitizedDescription;
		/** @var int */
		public $id;
		/** @var string */
		public $description;
	}