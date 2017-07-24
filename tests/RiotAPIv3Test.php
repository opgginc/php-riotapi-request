<?php

	use RiotQuest\Dto\LolStaticData\Champion\ChampionListDto;
	use RiotQuest\Dto\Summoner\SummonerDto;
	use RiotQuest\RequestMethod;

	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:52
	 */
	class RiotAPIv3Test extends \PHPUnit\Framework\TestCase
	{
		protected function riotApi() {
			return riotApi();
		}

		public function testSummoner() {
			// 자동완성 안되는 방식 ($summonerDto Type hinting not works)
			/** @var SummonerDto $summonerDto */
			$summonerDto = $this->riotApi()->call(new RequestMethod\Summoner\SummonerByName(OPServer::getCurrentPlatform(), "kargnas"));
			$this->assertTrue($summonerDto instanceof SummonerDto);
			$this->assertTrue($summonerDto->revisionDate instanceof \RiotQuest\Dto\DateTime);

//			$summonerDto            = new SummonerDto();
//			$summonerDto->id        = (float) 40040434;
//			$summonerDto->accountId = (float) 206664044;

			$this->riotApi()
				->add(new RequestMethod\Runes\RunesBySummoner(OPServer::getCurrentPlatform(), $summonerDto->id),
					function (\RiotQuest\Dto\Runes\RunePagesDto $runePagesDto) use ($summonerDto) {
						$this->assertTrue($runePagesDto->summonerId === $summonerDto->id);
						$this->assertTrue(array_first($runePagesDto->pages) instanceof \RiotQuest\Dto\Runes\RunePageDto);
					})
				->add(new RequestMethod\Masteries\MasteriesBySummoner(OPServer::getCurrentPlatform(), $summonerDto->id),
					function (\RiotQuest\Dto\Masteries\MasteryPagesDto $masteryPagesDto) use ($summonerDto) {
						$this->assertTrue($masteryPagesDto->summonerId === $summonerDto->id);
						$this->assertTrue(array_first($masteryPagesDto->pages) instanceof \RiotQuest\Dto\Masteries\MasteryPageDto);
					})
				->add(new RequestMethod\Match\MatchesByAccount(OPServer::getCurrentPlatform(), $summonerDto->accountId),
					function (\RiotQuest\Dto\Match\MatchlistDto $matchlist) {
						/** @var \RiotQuest\Dto\Match\MatchDto $match */
						$match = $this->riotApi()->call(new RequestMethod\Match\MatchById(OPServer::getCurrentPlatform(), $matchlist->matches[0]->gameId));
						$this->assertTrue($match instanceof \RiotQuest\Dto\Match\MatchDto);

						/** @var \RiotQuest\Dto\Match\Timeline\MatchTimelineDto $timeline */
						$timeline = $this->riotApi()->call(new RequestMethod\Match\TimelineById(OPServer::getCurrentPlatform(), $matchlist->matches[0]->gameId));
						$this->assertTrue($timeline instanceof \RiotQuest\Dto\Match\Timeline\MatchTimelineDto);
						$this->assertTrue($timeline->frames[0] instanceof \RiotQuest\Dto\Match\Timeline\MatchFrameDto);
					})
				->exec();
		}

		public function testExceptionOnAsyncRequest() {
			// ondone
			$exception = null;
			try {
				$this->riotApi()
					->add(new RequestMethod\Summoner\SummonerByName(OPServer::getCurrentPlatform(), 'kargnas'),
						function ($dto) {
							// For Test
							throw new \RiotQuest\Exception\UnknownQueueNameException("");
						})->exec();
			} catch (\RiotQuest\Exception\UnknownQueueNameException $e) {
				$exception = $e;
			}

			$this->assertNotNull($exception);

			// onfail
			$exception = null;
			try {
				$this->riotApi()
					->add(new RequestMethod\Summoner\SummonerByName(OPServer::getCurrentPlatform(), 'Riot_404Test'),
						function ($dto) {
							$this->fail("이 리퀘스트는 404 실패해야합니다.");
						}, function ($requestException) {
							// For Test
							throw new \RiotQuest\Exception\UnknownQueueNameException("");
						})->exec();
			} catch (\RiotQuest\Exception\UnknownQueueNameException $e) {
				$exception = $e;
			}

			$this->assertNotNull($exception);
		}

		public function testMultipleRequest() {
			$this->riotApi()
				->add(new RequestMethod\Summoner\SummonerByName(OPServer::getCurrentPlatform(), "kargnas"), function (SummonerDto $summonerDto) {
					$this->assertTrue($summonerDto instanceof SummonerDto);
				})->add(new RequestMethod\Summoner\SummonerByName(OPServer::getCurrentPlatform(), "hideonbush"), function (SummonerDto $summonerDto) {
					$this->assertTrue($summonerDto instanceof SummonerDto);
				})->exec();
		}

		public function testLeague() {
			/** @var SummonerDto $summonerDto */
			$summonerDto = $this->riotApi()->call(new RequestMethod\Summoner\SummonerByName(OPServer::getCurrentPlatform(), "kargnas"));

			$this->riotApi()
				->add(new RequestMethod\League\LeagueBySummoner(OPServer::getCurrentPlatform(), $summonerDto->id),
					function (array $leagueListDtos) use ($summonerDto) {
						$this->assertArrayHasKey(0, $leagueListDtos);
						$this->assertTrue($leagueListDtos[0] instanceof \RiotQuest\Dto\League\LeagueListDTO);
					})
				->add(new RequestMethod\League\LeaguePositionsBySummoner(OPServer::getCurrentPlatform(), $summonerDto->id),
					function (array $leaguePositionsDtos) {
						$this->assertArrayHasKey(0, $leaguePositionsDtos);
						$this->assertTrue($leaguePositionsDtos[0] instanceof \RiotQuest\Dto\League\LeaguePositionDTO);
					})
				->exec();

			$this->markTestSkipped();

			$this->riotApi()
				->add(new RequestMethod\League\MasterLeaguesByQueue(OPServer::getCurrentPlatform(), \RiotQuest\Constant\League::QUEUE_RANKED_SOLO), function (\RiotQuest\Dto\League\LeagueListDTO $leagueListDto) {
					$this->assertTrue($leagueListDto->entries[0] instanceof \RiotQuest\Dto\League\LeagueItemDTO);
				})
				->add(new RequestMethod\League\ChallengerLeaguesByQueue(OPServer::getCurrentPlatform(), \RiotQuest\Constant\League::QUEUE_RANKED_SOLO), function (\RiotQuest\Dto\League\LeagueListDTO $leagueListDto) {
					$this->assertTrue($leagueListDto->entries[0] instanceof \RiotQuest\Dto\League\LeagueItemDTO);
				})
				->exec();
		}

		public function testSpectator() {
			/** @var \RiotQuest\Dto\Spectator\FeaturedGames $featuredGames */
			$featuredGames = $this->riotApi()->call(new RequestMethod\Spectator\FeaturedGames(OPServer::getCurrentPlatform()));
			$this->assertTrue($featuredGames instanceof \RiotQuest\Dto\Spectator\FeaturedGames);

			if (sizeof($featuredGames->gameList) === 0) {
				$this->markTestSkipped("Any testable games are not featured.");
			}

			/** @var SummonerDto $summonerDto */
			$summonerDto = $this->riotApi()->call(new RequestMethod\Summoner\SummonerByName(OPServer::getCurrentPlatform(), $featuredGames->gameList[0]->participants[0]->summonerName));

			/** @var \LOL\Model\CurrentGame\CurrentGameInfo $currentGame */
			$currentGame = $this->riotApi()->call(new RequestMethod\Spectator\ActiveGameBySummoner(OPServer::getCurrentPlatform(), $summonerDto->id));
			$this->assertTrue($currentGame instanceof \RiotQuest\Dto\Spectator\CurrentGameInfo);
		}

		public function testStatic() {
			$this->riotApi()
				->add(new RequestMethod\LolStaticData\Champions(OPServer::getCurrentPlatform()), function (ChampionListDto $championListDto) {
					/** @var \RiotQuest\Dto\LolStaticData\Champion\ChampionDto $championDto */
					$championDto = array_first($championListDto->data);
					foreach ($championDto->spells[0]->effect as $effect) {
						// Must be NULL or Effect Instance
						$this->assertTrue($effect instanceof \RiotQuest\Dto\LolStaticData\Effect || is_null($effect));
					}
				})
				->add(new RequestMethod\LolStaticData\Items(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\Item\ItemListDto $itemListDto) {
					/** @var \RiotQuest\Dto\LolStaticData\Item\ItemDto $itemDto */
					$itemDto = array_first($itemListDto->data);
					$this->assertTrue($itemDto->stats instanceof \RiotQuest\Dto\LolStaticData\Item\InventoryDataStatsDto);
					$this->assertTrue($itemDto->gold instanceof \RiotQuest\Dto\LolStaticData\Item\GoldDto);
				})
				->add(new RequestMethod\LolStaticData\LanguageStrings(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\Language\LanguageStringsDto $languageStringsDto) {
					$this->assertTrue(is_string(array_first($languageStringsDto->data)));
				})
				->add(new RequestMethod\LolStaticData\Languages(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\LanguageListDto $languageListDto) {
					$this->assertTrue(is_string($languageListDto->first()));
				})
				->add(new RequestMethod\LolStaticData\Maps(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\Map\MapDataDto $mapDataDto) {
					$this->assertTrue(array_first($mapDataDto->data) instanceof \RiotQuest\Dto\LolStaticData\Map\MapDetailsDto);
				})
				->add(new RequestMethod\LolStaticData\Masteries(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\Mastery\MasteryListDto $masteryListDto) {
					$this->assertTrue(array_first($masteryListDto->data) instanceof \RiotQuest\Dto\LolStaticData\Mastery\MasteryDto);
					$this->assertTrue($masteryListDto->tree instanceof \RiotQuest\Dto\LolStaticData\Mastery\MasteryTreeDto);
				})
				->add(new RequestMethod\LolStaticData\ProfileIcons(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\ProfileIcon\ProfileIconDataDto $profileIconDataDto) {
					$this->assertTrue(array_first($profileIconDataDto->data) instanceof \RiotQuest\Dto\LolStaticData\ProfileIcon\ProfileIconDetailsDto);
				})
				->add(new RequestMethod\LolStaticData\Realms(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\Realm\RealmDto $realmDto) {

				})
				->add(new RequestMethod\LolStaticData\Runes(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\Rune\RuneListDto $runeListDto) {
					$this->assertTrue(array_first($runeListDto->data) instanceof \RiotQuest\Dto\LolStaticData\Rune\RuneDto);
				})
				->add(new RequestMethod\LolStaticData\SummonerSpells(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\SummonerSpell\SummonerSpellListDto $summonerSpellListDto) {
					$this->assertTrue(array_first($summonerSpellListDto->data) instanceof \RiotQuest\Dto\LolStaticData\SummonerSpell\SummonerSpellDto);
				})
				->add(new RequestMethod\LolStaticData\Versions(OPServer::getCurrentPlatform()), function (\RiotQuest\Dto\LolStaticData\VersionListDto $versionListDto) {
					$this->assertTrue(is_string($versionListDto->first()));
				})
				->exec();
		}
	}