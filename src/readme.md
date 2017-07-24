```php
$riotApi = new RiotQuest\RiotAPI("your_riotapi_key");
$summonerDto = (new RequestMethod\Summoner\SummonersByName(Platform::KR(), "kargnas"))->call($riotApi);
// $summonerDto is instanceof Dto\Summoner\SummonerDto);
// $summonerDto->revisionDate is instanceof Dto\DateTime);
// 실패시 RequestFailedException
```

```php
$riotApiAsync = new RiotQuest\RiotAPIAsync("your_riotapi_key");
$riotApiAsync
	->add(new RequestMethod\Summoner\SummonersByName(Platform::KR(), "kargnas"),
		function (\RiotQuest\Dto\Summoner\SummonerDto $summonerDto) {
			// $summonerDto is instanceof Dto\Summoner\SummonerDto);
			// $summonerDto->revisionDate is instanceof Dto\DateTime);
		})
	->add(new RequestMethod\Summoner\SummonersByName(Platform::KR(), "hideonbush"),
		function (\RiotQuest\Dto\Summoner\SummonerDto $summonerDto) {
			// $summonerDto is instanceof Dto\Summoner\SummonerDto);
			// $summonerDto->revisionDate is instanceof Dto\DateTime);
		}, function(\GuzzleHttp\Exception\RequestException $response){
			// 이 함수 두번째 파라미터)는 Optional. 실패시 Callback 이 지정되어 있지 않으면 RequestFailedException 을 발생한다.
		})
	->exec();
```