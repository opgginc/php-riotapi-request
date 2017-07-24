<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:56
	 */

	namespace RiotQuest\Dto\LolStaticData\Champion;

	use RiotQuest\Dto\BaseDto;

	class LevelTipDto extends BaseDto
	{
		/** @var string[] */
		public $effect;
		/** @var string[] */
		public $label;
	}