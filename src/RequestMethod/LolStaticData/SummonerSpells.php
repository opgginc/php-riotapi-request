<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 19:19
	 */

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\SummonerSpell\SummonerSpellListDto;
	use RiotQuest\Dto\LolStaticData\SummonerSpell\SummonerSpellDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class SummonerSpells extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA_DDRAGON_SUMMONER_SPELLS;

		/** @var string */
		public $locale, $version;

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . EndPoint::LOL_STATIC_DATA_DDRAGON_HOST . "/cdn/{$this->version}/data/{$this->locale}" . $this->path;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody(), true);

			$spellList          = new SummonerSpellListDto();
			$spellList->version = $json['version'];
			$spellList->type    = $json['type'];
			$spellList->data    = [];

			$mapper                  = new JsonMapper();
			$mapper->bEnforceMapType = false;

			foreach ($json['data'] as $spellKey => $spellRow) {

				$jsonSpellRow = json_decode(json_encode($spellRow), true);

				// fix diff between ddragon and static-data API
				foreach ($jsonSpellRow['vars'] as &$varRow) {
					if (!is_array($varRow['coeff'])) {
						$varRow['coeff'] = [(int) $varRow['coeff']];
					}
				}
				foreach ($jsonSpellRow['effectBurn'] as &$effectBurnRow) {
					if ($effectBurnRow == null) {
						$effectBurnRow = "";
					}
				}
				$jsonSpellRow['sanitizedDescription'] = $jsonSpellRow['description'];
				$jsonSpellRow['sanitizedTooltip']     = $jsonSpellRow['tooltip'];

				/** @var SummonerSpellDto $spellDto */
				$spellDto = $mapper->map($jsonSpellRow, new SummonerSpellDto());
				if ($spellDto != null) {
					// fix diff between ddragon and static-data API
					$spellDto->id                   = (int) $spellDto->key;
					$spellDto->key                  = $spellKey;
					$spellList->data[$spellDto->id] = $spellDto;
				}
			}

			return $spellList;
		}
	}