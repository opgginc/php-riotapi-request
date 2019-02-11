<?php

	namespace RiotQuest\RequestMethod\LeagueV4;

	use GuzzleHttp\Psr7\Response;
	use JsonMapper;
	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\League\LeaguePositionDTO;
	use RiotQuest\RequestMethod\RequestMethodAbstract;

	class LeaguePositionsByCondition extends RequestMethodAbstract
	{
		public $path = EndPoint::LEAGUEV4__POSITIONS_BY_CONDITION;

		private $positionalQueue;
		private $tier;
		private $division;
		private $position;
		private $page;

		function __construct(Platform $platform, $positionalQueue, $tier, $division, $position, $page) {
			parent::__construct($platform);
			$this->positionalQueue = $positionalQueue;
			$this->tier            = $tier;
			$this->division        = $division;
			$this->position        = $position;
			$this->page            = $page;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{positionalQueue}", $this->positionalQueue, $uri);
			$uri = str_replace("{tier}", $this->tier, $uri);
			$uri = str_replace("{division}", $this->division, $uri);
			$uri = str_replace("{position}", $this->position, $uri);
			$uri = str_replace("{page}", $this->page, $uri);

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