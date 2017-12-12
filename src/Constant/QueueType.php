<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 05:17
	 */

	namespace RiotQuest\Constant;

	use RiotQuest\Exception\UnknownQueueIdException;
	use RiotQuest\Exception\UnknownQueueNameException;

	class QueueType
	{
		const CUSTOM = 0; // Custom games
		const NORMAL_3x3 = 8; // Normal 3v3 games
		const NORMAL_5x5_BLIND = 2; // Normal 5v5 Blind Pick games
		const NORMAL_5x5_DRAFT = 14; // Normal 5v5 Draft Pick games
		const RANKED_SOLO_5x5 = 4; // Ranked Solo 5v5 games
		const RANKED_PREMADE_5x5 = 6; //  Ranked Premade 5v5 games
		const RANKED_PREMADE_3x3 = 9; // Used for both historical Ranked Premade 3v3 games and current Ranked Flex Twisted Treeline games
		const RANKED_FLEX_TT = 9; // Used for both historical Ranked Premade 3v3 games and current Ranked Flex Twisted Treeline games
		const RANKED_TEAM_3x3 = 41; // Ranked Team 3v3 games
		const RANKED_TEAM_5x5 = 42; // Ranked Team 5v5 games
		const ODIN_5x5_BLIND = 16; // Dominion 5v5 Blind Pick games
		const ODIN_5x5_DRAFT = 17; // Dominion 5v5 Draft Pick games
		const BOT_5x5 = 7; // Historical Summoner's Rift Coop vs AI games
		const BOT_ODIN_5x5 = 25; // Dominion Coop vs AI games
		const BOT_5x5_INTRO = 31; // Summoner's Rift Coop vs AI Intro Bot games
		const BOT_5x5_BEGINNER = 32; // Summoner's Rift Coop vs AI Beginner Bot games
		const BOT_5x5_INTERMEDIATE = 33; // Historical Summoner's Rift Coop vs AI Intermediate Bot games
		const BOT_TT_3x3 = 52; // Twisted Treeline Coop vs AI games
		const GROUP_FINDER_5x5 = 61; // Team Builder games
		const ARAM_5x5 = 65; // ARAM games
		const ONEFORALL_5x5 = 70; // One for All games
		const FIRSTBLOOD_1x1 = 72; // Snowdown Showdown 1v1 games
		const FIRSTBLOOD_2x2 = 73; // Snowdown Showdown 2v2 games
		const SR_6x6 = 75; // Summoner's Rift 6x6 Hexakill games
		const URF_5x5 = 76; // Ultra Rapid Fire games
		const ONEFORALL_MIRRORMODE_5x5 = 78; // One for All (Mirror mode)
		const BOT_URF_5x5 = 83; // Ultra Rapid Fire games played against AI games
		const NIGHTMARE_BOT_5x5_RANK1 = 91; // Doom Bots Rank 1 games
		const NIGHTMARE_BOT_5x5_RANK2 = 92; // Doom Bots Rank 2 games
		const NIGHTMARE_BOT_5x5_RANK5 = 93; // Doom Bots Rank 5 games
		const ASCENSION_5x5 = 96; // Ascension games
		const HEXAKILL = 98; // Twisted Treeline 6x6 Hexakill games
		const BILGEWATER_ARAM_5x5 = 100; // Butcher's Bridge games
		const KING_PORO_5x5 = 300; // King Poro games
		const COUNTER_PICK = 310; // Nemesis games
		const BILGEWATER_5x5 = 313; // Black Market Brawlers games
		const SIEGE = 315; // Nexus Siege games
		const DEFINITELY_NOT_DOMINION_5x5 = 317; // Definitely Not Dominion games
		const ARURF_5X5 = 318; // All Random URF games
		const ARSR_5x5 = 325; // All Random Summoner's Rift games
		const TEAM_BUILDER_DRAFT_UNRANKED_5x5 = 400; // Normal 5v5 Draft Pick games
		const TEAM_BUILDER_DRAFT_RANKED_5x5 = 410; // Ranked 5v5 Draft Pick games
		const TEAM_BUILDER_RANKED_SOLO = 420; // Ranked Solo games from current season that use Team Builder matchmaking
		const TB_BLIND_SUMMONERS_RIFT_5x5 = 430; // Normal 5v5 Blind Pick games
		const RANKED_FLEX_SR = 440; // Ranked Flex Summoner's Rift games
		const ASSASSINATE_5x5 = 600; // Blood Hunt Assassin games
		const DARKSTAR_3x3 = 610; // Dark Star games
		const VCP_NORMAL = 980; // Star Guardian Invasion: Normal games
		const VCP_ONSLAUGHT = 990; // Star Guardian Invasion: Onslaught games

		const NORMAL_BLIND_SR = 430; // Summoner's Rift 5v5 Blind Pick games
		const ARAM_5x5_NEW = 450; // ARAM games
		const NORMAL_TT = 460; // Twisted Treeline 3v3 Blind Pick games
		const RANKED_FLEX_TT_NEW = 470; // Ranked 3v3 Flex Twisted Treeline games
		const BOT_TT_INTERMEDIATE = 800; // Twisted Treeline Co-op vs. AI Intermediate Bot games
		const BOT_TT_INTRO = 810; // Twisted Treeline Co-op vs. AI Intro Bot games
		const BOT_TT_BEGINNER = 820; // Twisted Treeline Co-op vs. AI Beginner Bot games
		const BOT_SR_INTRO = 830; // Summoner's Rift Co-op vs. AI Intro Bot games
		const BOT_SR_BEGINNER = 840; // Summoner's Rift Co-op vs. AI Beginner Bot games
		const BOT_SR_INTERMEDIATE = 850; // Summoner's Rift Co-op vs. AI Intermediate Bot games
		const SIEGE_NEW = 940; // Nexus Siege games (315)

		const BOT_SR_NIGHTMARE_DIF = 950; // Doom Bots games /w difficulty voting (기존 91, 92, 93)
		const BOT_SR_NIGHTMARE = 960; // Doom Bots games

		const UNKNOWN_910 = 910;
		const UNKNOWN_920 = 920;
		const OVERCHARGE = 1000;

		public static $NORMALS = [
			self::NORMAL_3x3,
			self::NORMAL_5x5_DRAFT,
			self::NORMAL_5x5_BLIND,
			self::NORMAL_BLIND_SR,
			self::NORMAL_TT,
			self::TEAM_BUILDER_DRAFT_UNRANKED_5x5,
			self::TB_BLIND_SUMMONERS_RIFT_5x5,
		];

		public static $RANKED_SOLO = [
			self::TEAM_BUILDER_RANKED_SOLO,
			self::RANKED_SOLO_5x5,
		];

		public static $RANKED_FLEX = [
			self::RANKED_FLEX_TT,
			self::RANKED_FLEX_SR,
			self::TEAM_BUILDER_DRAFT_RANKED_5x5,
			self::RANKED_PREMADE_5x5,
			self::RANKED_PREMADE_3x3,
			self::RANKED_FLEX_TT_NEW,
		];

		public static $RANKED_TEAM = [
			self::RANKED_TEAM_5x5,
			self::RANKED_TEAM_3x3,
		];

		public static $BOT = [
			self::BOT_5x5,
			self::BOT_ODIN_5x5,
			self::BOT_5x5_INTRO,
			self::BOT_5x5_BEGINNER,
			self::BOT_5x5_INTERMEDIATE,
			self::BOT_TT_3x3,
			self::BOT_URF_5x5,
			self::NIGHTMARE_BOT_5x5_RANK1,
			self::NIGHTMARE_BOT_5x5_RANK2,
			self::NIGHTMARE_BOT_5x5_RANK5,
			self::BOT_TT_INTERMEDIATE,
			self::BOT_TT_INTRO,
			self::BOT_TT_BEGINNER,
			self::BOT_SR_INTERMEDIATE,
			self::BOT_SR_INTRO,
			self::BOT_SR_BEGINNER,
			self::BOT_SR_NIGHTMARE,
			self::BOT_SR_NIGHTMARE_DIF,
		];

		public static $ARAM = [
			self::ARAM_5x5,
			self::ARAM_5x5_NEW,
			self::BILGEWATER_ARAM_5x5,
		];

		public static $EVENT = [
			self::SR_6x6,
			self::HEXAKILL,
			self::URF_5x5,
			self::BOT_URF_5x5,
			self::ARURF_5X5,
			self::NIGHTMARE_BOT_5x5_RANK1,
			self::NIGHTMARE_BOT_5x5_RANK2,
			self::NIGHTMARE_BOT_5x5_RANK5,
			self::ASCENSION_5x5,
			self::KING_PORO_5x5,
			self::COUNTER_PICK,
			self::BILGEWATER_5x5,
			self::ARSR_5x5,
			self::VCP_NORMAL,
			self::VCP_ONSLAUGHT,
			self::SIEGE,
			self::SIEGE_NEW,
			self::BOT_SR_NIGHTMARE,
			self::BOT_SR_NIGHTMARE_DIF,
			self::OVERCHARGE,
		];

		/** @var integer */
		public $id;

		/** @var string */
		public $name;

		/**
		 * @param int $id
		 *
		 * @return QueueType
		 * @throws UnknownQueueIdException
		 */
		public static function ById($id) {
			$id = (int) $id;

			$map = static::Map();
			if (isset($map[$id])) {
				return new static($id, $map[$id]);
			}

			throw new UnknownQueueIdException("'{$id}' is unknown queue id.");
		}

		public static function ByName($queueName) {
			$map = static::Map();

			foreach ($map as $id => $name) {
				// startswith
				if (preg_match("/^" . preg_quote($queueName) . "/", $name)) {
					return static::ById($id);
				}
			}

			throw new UnknownQueueNameException("'{$queueName}' is unknown queue type.");
		}

		protected static function Map() {
			return [
				static::CUSTOM                          => "CUSTOM",
				static::NORMAL_3x3                      => "NORMAL_3x3",
				static::NORMAL_5x5_BLIND                => "NORMAL_5x5_BLIND",
				static::NORMAL_5x5_DRAFT                => "NORMAL_5x5_DRAFT",
				static::RANKED_SOLO_5x5                 => "RANKED_SOLO_5x5",
				static::RANKED_PREMADE_5x5              => "RANKED_PREMADE_5x5",
				static::RANKED_PREMADE_3x3              => "RANKED_PREMADE_3x3",
				static::RANKED_FLEX_TT                  => "RANKED_FLEX_TT",
				static::RANKED_TEAM_3x3                 => "RANKED_TEAM_3x3",
				static::RANKED_TEAM_5x5                 => "RANKED_TEAM_5x5",
				static::ODIN_5x5_BLIND                  => "ODIN_5x5_BLIND",
				static::ODIN_5x5_DRAFT                  => "ODIN_5x5_DRAFT",
				static::BOT_5x5                         => "BOT_5x5",
				static::BOT_ODIN_5x5                    => "BOT_ODIN_5x5",
				static::BOT_5x5_INTRO                   => "BOT_5x5_INTRO",
				static::BOT_5x5_BEGINNER                => "BOT_5x5_BEGINNER",
				static::BOT_5x5_INTERMEDIATE            => "BOT_5x5_INTERMEDIATE",
				static::BOT_TT_3x3                      => "BOT_TT_3x3",
				static::GROUP_FINDER_5x5                => "GROUP_FINDER_5x5",
				static::ARAM_5x5                        => "ARAM_5x5",
				static::ONEFORALL_5x5                   => "ONEFORALL_5x5",
				static::FIRSTBLOOD_1x1                  => "FIRSTBLOOD_1x1",
				static::FIRSTBLOOD_2x2                  => "FIRSTBLOOD_2x2",
				static::SR_6x6                          => "SR_6x6",
				static::URF_5x5                         => "URF_5x5",
				static::ONEFORALL_MIRRORMODE_5x5        => "ONEFORALL_MIRRORMODE_5x5",
				static::BOT_URF_5x5                     => "BOT_URF_5x5",
				static::NIGHTMARE_BOT_5x5_RANK1         => "NIGHTMARE_BOT_5x5_RANK1",
				static::NIGHTMARE_BOT_5x5_RANK2         => "NIGHTMARE_BOT_5x5_RANK2",
				static::NIGHTMARE_BOT_5x5_RANK5         => "NIGHTMARE_BOT_5x5_RANK5",
				static::ASCENSION_5x5                   => "ASCENSION_5x5",
				static::HEXAKILL                        => "HEXAKILL",
				static::BILGEWATER_ARAM_5x5             => "BILGEWATER_ARAM_5x5",
				static::KING_PORO_5x5                   => "KING_PORO_5x5",
				static::COUNTER_PICK                    => "COUNTER_PICK",
				static::BILGEWATER_5x5                  => "BILGEWATER_5x5",
				static::SIEGE                           => "SIEGE",
				static::DEFINITELY_NOT_DOMINION_5x5     => "DEFINITELY_NOT_DOMINION_5x5",
				static::ARURF_5X5                       => "ARURF_5X5",
				static::ARSR_5x5                        => "ARSR_5x5",
				static::TEAM_BUILDER_DRAFT_UNRANKED_5x5 => "TEAM_BUILDER_DRAFT_UNRANKED_5x5",
				static::TEAM_BUILDER_DRAFT_RANKED_5x5   => "TEAM_BUILDER_DRAFT_RANKED_5x5",
				static::TEAM_BUILDER_RANKED_SOLO        => "TEAM_BUILDER_RANKED_SOLO",
				static::TB_BLIND_SUMMONERS_RIFT_5x5     => "TB_BLIND_SUMMONERS_RIFT_5x5",
				static::RANKED_FLEX_SR                  => "RANKED_FLEX_SR",
				static::ASSASSINATE_5x5                 => "ASSASSINATE_5x5",
				static::DARKSTAR_3x3                    => "DARKSTAR_3x3",

				static::ARAM_5x5_NEW         => "ARAM_5x5_NEW",
				static::NORMAL_TT            => "NORMAL_TT",
				static::RANKED_FLEX_TT_NEW   => "RANKED_FLEX_TT_NEW",
				static::BOT_TT_INTERMEDIATE  => "BOT_TT_INTERMEDIATE",
				static::BOT_TT_INTRO         => "BOT_TT_INTRO",
				static::BOT_TT_BEGINNER      => "BOT_TT_BEGINNER",
				static::BOT_SR_INTRO         => "BOT_SR_INTRO",
				static::BOT_SR_BEGINNER      => "BOT_SR_BEGINNER",
				static::BOT_SR_INTERMEDIATE  => "BOT_SR_INTERMEDIATE",
				static::SIEGE_NEW            => "SIEGE_NEW",
				static::VCP_NORMAL           => 'VCP_NORMAL',
				static::VCP_ONSLAUGHT        => 'VCP_ONSLAUGHT',
				static::NORMAL_BLIND_SR      => "NORMAL_BLIND_SR",
				static::BOT_SR_NIGHTMARE_DIF => "BOT_SR_NIGHTMARE_DIF",
				static::BOT_SR_NIGHTMARE     => "BOT_SR_NIGHTMARE",

				static::UNKNOWN_910 => "UNKNOWN_910",
				static::UNKNOWN_920 => "UNKNOWN_920",
				static::OVERCHARGE => "OVERCHARGE",
			];
		}

		public function isRanked() {
			return in_array($this->id, static::$RANKED_FLEX, true)
				|| in_array($this->id, static::$RANKED_SOLO, true)
				|| in_array($this->id, static::$RANKED_TEAM, true);
		}

		public function isNormal() { return in_array($this->id, static::$NORMALS, true); }

		public function isRankedFlex() { return in_array($this->id, static::$RANKED_FLEX, true); }

		public function isRankedSolo() { return in_array($this->id, static::$RANKED_SOLO, true); }

		public function isRankedTeam() { return in_array($this->id, static::$RANKED_TEAM, true); }

		public function isBot() { return in_array($this->id, static::$BOT, true); }

		public function isAram() { return in_array($this->id, static::$ARAM, true); }

		function __construct($id, $name) {
			$this->id   = $id;
			$this->name = $name;
		}

		public function __toString() {
			return $this->name;
		}
	}