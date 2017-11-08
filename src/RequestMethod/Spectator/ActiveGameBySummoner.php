<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:55
	 */

	namespace RiotQuest\RequestMethod\Spectator;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\Spectator\CurrentGameInfo;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class ActiveGameBySummoner extends RequestMethodAbstract
	{
		public $path = EndPoint::SPECTATOR__ACTIVE_GAMES_BY_SUMMONER;

		public $summonerId;

		function __construct(Platform $platform, $summonerId) {
			parent::__construct($platform);

			$this->summonerId = $summonerId;
		}

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{summonerId}", $this->summonerId, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			/** @var CurrentGameInfo $object */
			$object = $mapper->map($json, new CurrentGameInfo());
			return $object;
		}
	}