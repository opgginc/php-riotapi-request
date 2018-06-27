<?php

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Perk\PerkDto;
	use RiotQuest\Dto\LolStaticData\Perk\PerkListDto;
	use RiotQuest\Dto\LolStaticData\Perk\PerkPathsDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class PerkPaths extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA__PERK_PATHS;

		/** @var string */
		public $locale, $version;

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;

			$query = static::buildParams([
				                             'locale'  => $this->locale,
				                             'version' => $this->version
			                             ]);

			if (strlen($query) > 0) {
				$uri .= "?{$query}";
			}
			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody(), true);

//			\OPGG\Debug\PartLogger::Info(\OPGG\Debug\PartLogger::LOGGER_RENEW_STATIC_DATA, $response->getBody());
			$perkPaths = new PerkPathsDto();
			$perkPaths->version = $this->version;
			$perkPaths->data = [];

			foreach ($json as $jsonRow) {
				$ppId = $jsonRow['id'];
				$ppData = [];
				foreach ($jsonRow['slots'] as $jsonSlot) {
					$runeIds = [];
					foreach ($jsonSlot['runes'] as $jsonRune) {
						$runeId = $jsonRune['id'];
						$runeIds[] = $runeId;
					}
					$ppData[] = $runeIds;
				}

				$perkPaths->data[] = [
					$ppId => $ppData
				];
			}
			return $perkPaths;
		}
	}