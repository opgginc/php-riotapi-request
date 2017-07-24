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
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class SummonerByAccountId extends RequestMethodAbstract
	{
		public $accountId;

		function __construct(Platform $platform, $accountId) {
			parent::__construct($platform);

			$this->accountId = $accountId;
		}

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . EndPoint::SUMMONER__SUMMONERS_BY_ACCOUNT;
			$uri = str_replace("{accountId}", $this->accountId, $uri);

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