<?php

	namespace RiotQuest\Dto\Spectator;

	use RiotQuest\Dto\BaseDto;

	class Perks extends BaseDto
	{
		/** @var double[] */
		public $perkIds;
		/** @var double */
		public $perkStyle;
		/** @var double */
		public $perkSubStyle;
	}