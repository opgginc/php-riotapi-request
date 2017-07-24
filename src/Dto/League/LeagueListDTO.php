<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:05
	 */

	namespace RiotQuest\Dto\League;

	use RiotQuest\Dto\BaseDto;

	class LeagueListDTO extends BaseDto
	{
		/** @var string */
		public $tier;
		/** @var string */
		public $queue;
		/** @var string */
		public $name;
		/** @var LeagueItemDTO[] */
		public $entries;
	}