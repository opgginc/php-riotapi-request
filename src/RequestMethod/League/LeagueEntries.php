<?php

	namespace RiotQuest\RequestMethod\League;

	use GuzzleHttp\Psr7\Response;
	use JsonMapper;
	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\League\LeaguePositionDTO;
	use RiotQuest\RequestMethod\RequestMethodAbstract;

	class LeagueEntries extends RequestMethodAbstract
	{
		public $path = EndPoint::LEAGUE__ENTRIES;

		public $queue, $tier, $division, $page;

		function __construct(Platform $platform, $queue, $tier, $division, $page) {
			parent::__construct($platform);

			$this->queue    = $queue;
			$this->tier     = $tier;
			$this->division = $division;
			$this->page     = $page;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;

			$uri = str_replace('{queue}', $this->queue, $uri);
			$uri = str_replace('{tier}', $this->tier, $uri);
			$uri = str_replace('{division}', $this->division, $uri);
			$uri .= "?page={$this->page}";

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