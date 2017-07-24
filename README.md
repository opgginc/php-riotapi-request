riotapi-request
===============

## Features
- DTO Support
- Batch calls (async request using guzzlehttp promise)
  - You can control concurrency sessions

## Example
```php
use RiotQuest\Dto\LolStaticData\Champion\ChampionListDto;
use RiotQuest\Dto\Summoner\SummonerDto;
use RiotQuest\RequestMethod;

function riotApi() {
    return new RiotQuest\AsyncRiotAPI('api_key');
}

/** @var SummonerDto $summonerDto */
$summonerDto = $this->riotApi()->call(new RequestMethod\Summoner\SummonerByName(OPServer::getCurrentPlatform(), "kargnas"));
$this->assertTrue($summonerDto instanceof SummonerDto);
$this->assertTrue($summonerDto->revisionDate instanceof \RiotQuest\Dto\DateTime);

$this->riotApi()
    ->add(new RequestMethod\Runes\RunesBySummoner(OPServer::getCurrentPlatform(), $summonerDto->id),
        function (\RiotQuest\Dto\Runes\RunePagesDto $runePagesDto) use ($summonerDto) {
            var_dump($runePagesDto->summonerId === $summonerDto->id);
            var_dump(array_first($runePagesDto->pages) instanceof \RiotQuest\Dto\Runes\RunePageDto);
        })
    ->add(new RequestMethod\Masteries\MasteriesBySummoner(OPServer::getCurrentPlatform(), $summonerDto->id),
        function (\RiotQuest\Dto\Masteries\MasteryPagesDto $masteryPagesDto) use ($summonerDto) {
            var_dump($masteryPagesDto->summonerId === $summonerDto->id);
            var_dump(array_first($masteryPagesDto->pages) instanceof \RiotQuest\Dto\Masteries\MasteryPageDto);
        })
    ->add(new RequestMethod\Match\MatchesByAccount(OPServer::getCurrentPlatform(), $summonerDto->accountId),
        function (\RiotQuest\Dto\Match\MatchlistDto $matchlist) {
            /** @var \RiotQuest\Dto\Match\MatchDto $match */
            $match = $this->riotApi()->call(new RequestMethod\Match\MatchById(OPServer::getCurrentPlatform(), $matchlist->matches[0]->gameId));
            var_dump($match instanceof \RiotQuest\Dto\Match\MatchDto);

            /** @var \RiotQuest\Dto\Match\Timeline\MatchTimelineDto $timeline */
            $timeline = $this->riotApi()->call(new RequestMethod\Match\TimelineById(OPServer::getCurrentPlatform(), $matchlist->matches[0]->gameId));
            var_dump($timeline instanceof \RiotQuest\Dto\Match\Timeline\MatchTimelineDto);
            var_dump($timeline->frames[0] instanceof \RiotQuest\Dto\Match\Timeline\MatchFrameDto);
        })
    ->exec();
```

## TODO
- Rate limit
- PSR-6