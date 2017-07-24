<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:11
	 */

	namespace RiotQuest\Dto\LolStaticData\Mastery;

	use RiotQuest\Dto\BaseDto;

	class MasteryDto extends BaseDto
	{
		/** @var string */
		public $prereq;
		/** @var string    (Legal values: Cunning, Ferocity, Resolve) */
		public $masteryTree;
		/** @var string */
		public $name;
		/** @var int */
		public $ranks;
		/** @var \RiotQuest\Dto\LolStaticData\ImageDto */
		public $image;
		/** @var string[] */
		public $sanitizedDescription;
		/** @var int */
		public $id;
		/** @var string[] */
		public $description;
	}