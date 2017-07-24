<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:23
	 */

	namespace RiotQuest\Dto\Match;

	use RiotQuest\Dto\BaseDto;

	class PlayerDto extends BaseDto
	{
		/** @var string */
		public $currentPlatformId;
		/** @var string */
		public $summonerName;
		/** @var string */
		public $matchHistoryUri;
		/** @var string */
		public $platformId;
		/** @var double */
		public $currentAccountId;
		/** @var int */
		public $profileIcon;
		/** @var double */
		public $summonerId;
		/** @var double */
		public $accountId;
	}