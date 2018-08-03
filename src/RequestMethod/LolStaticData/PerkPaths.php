<?php

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Perk\PerkPathsDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;

	class PerkPaths extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA_DDRAGON_PERKS;

		/** @var string */
		public $locale, $version;

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . EndPoint::LOL_STATIC_DATA_DDRAGON_HOST . "/cdn/{$this->version}/data/{$this->locale}" . $this->path;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody(), true);

			$perkPaths          = new PerkPathsDto();
			$perkPaths->version = $this->version;
			$perkPaths->data    = [];

			foreach ($json as $jsonRow) {
				$ppId   = $jsonRow['id'];
				$ppData = [];
				foreach ($jsonRow['slots'] as $jsonSlot) {
					$runeIds = [];
					foreach ($jsonSlot['runes'] as $jsonRune) {
						$runeId    = $jsonRune['id'];
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