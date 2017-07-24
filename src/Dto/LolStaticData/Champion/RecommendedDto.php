<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:56
	 */

	namespace RiotQuest\Dto\LolStaticData\Champion;

	use RiotQuest\Dto\BaseDto;

	class RecommendedDto extends BaseDto
	{
		/** @var string */
		public $map;
		/** @var BlockDto[] */
		public $blocks;
		/** @var string */
		public $champion;
		/** @var string */
		public $title;
		/** @var boolean */
		public $priority;
		/** @var string */
		public $mode;
		/** @var string */
		public $type;
	}