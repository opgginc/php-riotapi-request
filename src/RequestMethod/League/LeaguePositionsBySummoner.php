<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:02
	 */

	namespace RiotQuest\RequestMethod\League;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\League\LeaguePositionDTO;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class LeaguePositionsBySummoner extends RequestMethodAbstract
	{
		public $path = EndPoint::LEAGUE__POSITIONS_BY_SUMMONER;

		/** @deprecated */
		public $summonerId;

		public $encryptedSummonerId;

		function __construct(Platform $platform, $encryptedSummonerId) {
			parent::__construct($platform);

			$this->encryptedSummonerId = $encryptedSummonerId;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{encryptedSummonerId}", $this->encryptedSummonerId, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			$items = [];
			foreach ($json as $key => $val) {
				$items[] = $mapper->map($val, new LeaguePositionDTO());
			}
			return $items;
		}
	}