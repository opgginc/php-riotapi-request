<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 03:47
	 */

	namespace RiotQuest\RequestMethod\Summoner;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\Summoner\SummonerDto;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	/**
	 * Class SummonersById
	 * @package RiotQuest\RequestMethod\Summoner
	 */
	class SummonerById extends RequestMethodAbstract
	{
		public $id;

		function __construct(Platform $platform, $id) {
			parent::__construct($platform);

			$this->id = $id;
		}

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . EndPoint::SUMMONER__BY_SUMMONER;
			$uri = str_replace("{summonerId}", $this->id, $uri);

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