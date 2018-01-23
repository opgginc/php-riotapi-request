<?php
/**
 * User: kiseok
 * Date: 1/23/18 4:31 PM
 */

namespace RiotQuest\Dto\ChampionMastery;

	use RiotQuest\Dto\BaseDto;

	/**
	 * Created by IntelliJ IDEA.
	 * User: kiseok
	 * Date: 2018. 1. 22.
	 * Time: PM 5:46
	 */
	class ChampionMasteryDto extends BaseDto
	{
		/** @var  boolean Is chest granted for this champion or not in current season. */
		public $chestGranted;
		/** @var  int Champion level for specified player and champion combination. */
		public $championLevel;
		/** @var  int Total number of champion points for this player and champion combination - they are used to determine championLevel. */
		public $championPoints;
		/** @var  int Champion ID for this entry. */
		public $championId;
		/** @var  int Player ID for this entry. */
		public $playerId;
		/** @var  int Number of points needed to achieve next level. Zero if player reached maximum champion level for this champion. */
		public $championPointsUntilNextLevel;
		/** @var  int The token earned for this champion to levelup. */
		public $tokensEarned;
		/** @var  int Number of points earned since current level has been achieved. */
		public $championPointsSinceLastLevel;
		/** @var  \RiotQuest\Dto\DateTime Last time this champion was played by this player - in Unix milliseconds time format. */
		public $lastPlayTime;
	}