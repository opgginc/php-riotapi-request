<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:34
	 */

	namespace RiotQuest\RequestMethod\League;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\League\LeagueListDTO;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class GrandMasterLeagues extends RequestMethodAbstract
	{
		public $path = EndPoint::LEAGUE__GRANDMASTER_LEAGUES_BY_QUEUE;

		public $queue;

		function __construct(Platform $platform, $queue) {
			parent::__construct($platform);

			$this->queue = $queue;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{queue}", $this->queue, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			return $mapper->map($json, new LeagueListDTO());
		}
	}