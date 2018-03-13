<?php

	namespace RiotQuest\RequestMethod\ChampionMastery;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\ChampionMastery\ChampionMasteryDto;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	/**
	 * Created by IntelliJ IDEA.
	 * User: kiseok
	 * Date: 2018. 1. 22.
	 * Time: PM 5:51
	 */

	class ChampionMasteryBySummonerId extends RequestMethodAbstract
	{
		public $path = EndPoint::CHAMPION_MASTERY__MASTERIES_BY_SUMMONER;

		public $summonerId;

		/**
		 * ChampionMasteryBySummonerId constructor.
		 *
		 * @param Platform $platform
		 * @param          $summonerId
		 */
		public function __construct(Platform $platform, $summonerId) {
			parent::__construct($platform);
			$this->summonerId = $summonerId;
		}


		/**
		 * @return \GuzzleHttp\Psr7\Request
		 */
		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{summonerId}", $this->summonerId, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		/**
		 * @param \GuzzleHttp\Psr7\Response $response
		 *
		 * @return mixed|\RiotQuest\Dto\BaseDto|\RiotQuest\Dto\BaseArrayDto|array
		 */
		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			$items = [];
			foreach ($json as $key => $val) {
				$items[] = $mapper->map($val, new ChampionMasteryDto());
		}
			return $items;
		}
	}