<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:52
	 */

	namespace RiotQuest\Dto\Spectator;

	use RiotQuest\Dto\BaseDto;

	class FeaturedGames extends BaseDto
	{
		/** @var double    The suggested interval to wait before requesting FeaturedGames again */
		public $clientRefreshInterval;
		/** @var FeaturedGameInfo[]    The list of featured games */
		public $gameList;
	}