<?php

	namespace RiotQuest\Dto\Spectator;

	use RiotQuest\Dto\BaseDto;

	class Perk extends BaseDto
	{
		/** @var double[] */
		public $perkIds;
		/** @var double */
		public $perkStyle;
		/** @var double */
		public $perkSubStyle;
	}