<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:56
	 */

	namespace RiotQuest\Dto\LolStaticData;

	use RiotQuest\Dto\BaseDto;

	class SpellVarsDto extends BaseDto
	{
		/** @var string */
		public $ranksWith;
		/** @var string */
		public $dyn;
		/** @var string */
		public $link;
		/** @var double[] */
		public $coeff;
		/** @var string */
		public $key;
	}