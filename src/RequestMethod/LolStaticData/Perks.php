<?php

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Perk\PerkDto;
	use RiotQuest\Dto\LolStaticData\Perk\PerkListDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Perks extends RequestMethodAbstract
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

			$perkList          = new PerkListDto();
			$perkList->version = $this->version;
			$perkList->data    = [];

			$mapper = new JsonMapper();
			foreach ($json as $styleRow) {
				$slotsArr = $styleRow['slots'];
				foreach ($slotsArr as $slotRow) {
					$runesArr = $slotRow['runes'];
					foreach ($runesArr as $runeRow) {
						$jsonRuneRow = json_decode(json_encode($runeRow));
						$perkDto     = $mapper->map($jsonRuneRow, new PerkDto());
						if ($perkDto !== null) {
							$perkList->data[] = $perkDto;
						}
					}

				}

			}
			return $perkList;
		}

	}