<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:19
	 */

	namespace RiotQuest\Dto\Champion;

	use RiotQuest\Dto\BaseDto;

	class ChampionDto extends BaseDto
	{
		/** @var boolean    Ranked play enabled flag. */
		public $rankedPlayEnabled;
		/** @var boolean    Bot enabled flag (for custom games). */
		public $botEnabled;
		/** @var boolean    Bot Match Made enabled flag (for Co-op vs. AI games). */
		public $botMmEnabled;
		/** @var boolean    Indicates if the champion is active. */
		public $active;
		/** @var boolean    Indicates if the champion is free to play. Free to play champions are rotated periodically. */
		public $freeToPlay;
		/** @var double    Champion ID. For static information correlating to champion IDs, please refer to the LoL Static Data API. */
		public $id;
	}