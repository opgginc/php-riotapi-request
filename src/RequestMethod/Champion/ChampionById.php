<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:34
	 */

	namespace RiotQuest\RequestMethod\Champion;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\Champion\ChampionDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class ChampionById extends RequestMethodAbstract
	{
		public $path = EndPoint::CHAMPION__CHAMPION;

		public $championId;

		function __construct(Platform $platform, $championId) {
			parent::__construct($platform);

			$this->championId = $championId;
		}

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{id}", $this->championId, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			return $mapper->map($json, new ChampionDto());
		}
	}