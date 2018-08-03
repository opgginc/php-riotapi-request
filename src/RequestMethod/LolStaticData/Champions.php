<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:43
	 */

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Champion\ChampionListDto;
	use RiotQuest\Dto\LolStaticData\Champion\ChampionDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Champions extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA_DDRAGON_CHAMPIONS;

		/** @var string */
		public $locale, $version;

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . EndPoint::LOL_STATIC_DATA_DDRAGON_HOST . "/cdn/{$this->version}/data/{$this->locale}" . $this->path;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody(), true);

			$mapper                  = new JsonMapper();
			$mapper->bEnforceMapType = false;

			$championList          = new ChampionListDto();
			$championList->version = $json['version'];
			$championList->type    = $json['type'];
			$championList->format  = $json['format'];

			$championList->keys = [];
			$championList->data = [];

			foreach ($json['data'] as $champKey => $champRow) {
				$jsonChampRow = json_decode(json_encode($champRow), true);

				foreach ($jsonChampRow['spells'] as &$spellRow) {
					// fix diff between ddragon and static-data API
					foreach ($spellRow['vars'] as &$varRow) {
						if (!is_array($varRow['coeff'])) {
							$varRow['coeff'] = [(double) $varRow['coeff']];
						}
					}
					foreach ($spellRow['effectBurn'] as &$effectBurnRow) {
						if ($effectBurnRow == null) {
							$effectBurnRow = "";
						}
					}
					$spellRow['key'] = $spellRow['id'];
					unset($spellRow['id']);

					$spellRow['sanitizedDescription'] = $spellRow['description'];
					$spellRow['sanitizedTooltip']     = $spellRow['tooltip'];
				}

				/** @var ChampionDto $championDto */
				$championDto = $mapper->map($jsonChampRow, new ChampionDto());
				if ($championDto != null) {
					$championDto->id  = (int) $champRow['key'];
					$championDto->key = $champKey;
				}

				$championList->keys[$championDto->id] = $championDto->key;
				$championList->data[$championDto->id] = $championDto;
			}

			return $championList;
		}
	}