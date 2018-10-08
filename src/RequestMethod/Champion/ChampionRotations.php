<?php

	namespace RiotQuest\RequestMethod\Champion;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\Champion\FreeChampionIdsDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class ChampionRotations extends RequestMethodAbstract
	{
		public $path = EndPoint::CHAMPION__ROTATIONS;

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			return $mapper->map($json, new FreeChampionIdsDto());
		}
	}