<?php

	namespace RiotQuest\Dto\MatchV5;

	use RiotQuest\Dto\BaseDto;

	class TeamObjectDto extends BaseDto
	{
	    /** @var TeamObjectDetailDto */
	    public $baron;
	    /** @var TeamObjectDetailDto */
	    public $champion;
	    /** @var TeamObjectDetailDto */
	    public $dragon;
	    /** @var TeamObjectDetailDto */
	    public $inhibitor;
	    /** @var TeamObjectDetailDto */
	    public $riftHerald;
	    /** @var TeamObjectDetailDto */
	    public $tower;

	}