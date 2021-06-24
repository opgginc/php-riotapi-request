<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

    class TeamDto extends BaseDto
	{
		/** @var TeamBanDto[] */
		public $bans;
		/** @var TeamObjectDto */
		public $objectives;
        /** @var int */
        public $teamId;
        /** @var boolean */
        public $win;
	}