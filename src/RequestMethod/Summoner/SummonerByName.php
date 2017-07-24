<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 03:42
	 */

	namespace RiotQuest\RequestMethod\Summoner;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\Summoner\SummonerDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class SummonerByName extends RequestMethodAbstract
	{
		public $name;

		function __construct(Platform $platform, $name) {
			parent::__construct($platform);

			$this->name = $name;
		}

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . EndPoint::SUMMONER__SUMMONERS_BY_NAME;
			$uri = str_replace("{summonerName}", $this->name, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			/** @var SummonerDto $object */
			$object = $mapper->map($json, new SummonerDto());
			return $object;
		}
	}