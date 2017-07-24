<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:10
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	class MatchlistDto extends BaseDto
	{
		/** @var MatchReferenceDto[] */
		public $matches;
		/** @var int */
		public $totalGames;
		/** @var int */
		public $startIndex;
		/** @var int */
		public $endIndex;
	}