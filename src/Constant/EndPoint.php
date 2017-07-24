<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 01:31
	 */

	namespace RiotQuest\Constant;

	class EndPoint
	{
		/**
		 * 상수 이름에는 특별한 규칙이 존재하지 않는다. 중복만 되지 않게 하면 된다.
		 * 값은 {parameterName} 으로 구성한다. 첨부되어 있는 엑셀파일에서 편집 후 붙여넣기하여서 IntelliJ 의 멀티커서 기능을 이용하면 편집이 용이하다.
		 */
		const SUMMONER__SUMMONERS_BY_ACCOUNT = "/lol/summoner/v3/summoners/by-account/{accountId}";
		const SUMMONER__SUMMONERS_BY_NAME = "/lol/summoner/v3/summoners/by-name/{summonerName}";
		const SUMMONER__BY_SUMMONER = "/lol/summoner/v3/summoners/{summonerId}";
		const MATCH__BY_MATCH = "/lol/match/v3/matches/{matchId}";
		const MATCH__LIST_BY_ACCOUNT = "/lol/match/v3/matchlists/by-account/{accountId}";
		const MATCH__RECENT_LIST_BY_ACCOUNT = "/lol/match/v3/matchlists/by-account/{accountId}/recent";
		const MATCH__TIMELINE_BY_MATCH = "/lol/match/v3/timelines/by-match/{matchId}";
		const SPECTATOR__ACTIVE_GAMES_BY_SUMMONER = "/lol/spectator/v3/active-games/by-summoner/{summonerId}";
		const SPECTATOR__FEATURED_GAMES = "/lol/spectator/v3/featured-games";
		const LEAGUE__CHALLENGER_LEAGUES_BY_QUEUE = "/lol/league/v3/challengerleagues/by-queue/{queue}";
		const LEAGUE__LEAGUES_BY_SUMMONER = "/lol/league/v3/leagues/by-summoner/{summonerId}";
		const LEAGUE__MASTER_LEAGUES_BY_QUEUE = "/lol/league/v3/masterleagues/by-queue/{queue}";
		const LEAGUE__POSITIONS_BY_SUMMONER = "/lol/league/v3/positions/by-summoner/{summonerId}";
		const MASTERIES__BY_SUMMONER = "/lol/platform/v3/masteries/by-summoner/{summonerId}";
		const RUNES__BY_SUMMONER = "/lol/platform/v3/runes/by-summoner/{summonerId}";
		const CHAMPION_MASTERY__MASTERIES_BY_SUMMONER = "/lol/champion-mastery/v3/champion-masteries/by-summoner/{summonerId}";
		const CHAMPION_MASTERY__MASTERIES_BY_SUMMONER_AND_BY_CHAMPION = "/lol/champion-mastery/v3/champion-masteries/by-summoner/{summonerId}/by-champion/{championId}";
		const CHAMPION_MASTERY__SCORES_BY_SUMMONER = "/lol/champion-mastery/v3/scores/by-summoner/{summonerId}";
		const CHAMPION__CHAMPIONS = "/lol/platform/v3/champions";
		const CHAMPION__CHAMPION = "/lol/platform/v3/champions/{id}";
		const LOL_STATIC_DATA__CHAMPIONS = "/lol/static-data/v3/champions";
		const LOL_STATIC_DATA__CHAMPION = "/lol/static-data/v3/champions/{id}";
		const LOL_STATIC_DATA__ITEMS = "/lol/static-data/v3/items";
		const LOL_STATIC_DATA__ITEM = "/lol/static-data/v3/items/{id}";
		const LOL_STATIC_DATA__LANGUAGE_STRINGS = "/lol/static-data/v3/language-strings";
		const LOL_STATIC_DATA__LANGUAGES = "/lol/static-data/v3/languages";
		const LOL_STATIC_DATA__MAPS = "/lol/static-data/v3/maps";
		const LOL_STATIC_DATA__MASTERIES = "/lol/static-data/v3/masteries";
		const LOL_STATIC_DATA__MASTERY = "/lol/static-data/v3/masteries/{id}";
		const LOL_STATIC_DATA__PROFILE_ICONS = "/lol/static-data/v3/profile-icons";
		const LOL_STATIC_DATA__REALMS = "/lol/static-data/v3/realms";
		const LOL_STATIC_DATA__RUNES = "/lol/static-data/v3/runes";
		const LOL_STATIC_DATA__RUNE = "/lol/static-data/v3/runes/{id}";
		const LOL_STATIC_DATA__SUMMONER_SPELLS = "/lol/static-data/v3/summoner-spells";
		const LOL_STATIC_DATA__SUMMONER_SPELL = "/lol/static-data/v3/summoner-spells/{id}";
		const LOL_STATIC_DATA__VERSIONS = "/lol/static-data/v3/versions";
		const LOL_STATUS__SHARED_DATA = "/lol/status/v3/shard-data";
	}