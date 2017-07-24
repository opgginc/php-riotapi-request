<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:50
	 */

	namespace RiotQuest\Dto\Spectator;

	use RiotQuest\Dto\BaseDto;

	class BannedChampion extends BaseDto
	{
		/** @var  int    The turn during which the champion was banned */
		public $pickTurn;
		/** @var  double    The ID of the banned champion */
		public $championId;
		/** @var  double    The ID of the team that banned the champion */
		public $teamId;
	}