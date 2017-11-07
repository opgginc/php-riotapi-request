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
	use RiotQuest\Dto\League\LeagueListDTO;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class League extends RequestMethodAbstract
	{
		public $path = EndPoint::LEAGUE__LEAGUES;

		public $leagueId;

		function __construct(Platform $platform, $leagueId) {
			parent::__construct($platform);

			$this->leagueId = $leagueId;
		}

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{leagueId}", $this->leagueId, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();
			return $mapper->map($json, new LeagueListDTO());
		}
	}