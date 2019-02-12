<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 03:47
	 */

	namespace RiotQuest\RequestMethod\Summoner;

	use GuzzleHttp\Psr7\Response;
	use JsonMapper;
	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\Summoner\SummonerDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;

	class SummonerByAccountId extends RequestMethodAbstract
	{
		public $path = EndPoint::SUMMONER__SUMMONERS_BY_ACCOUNT;

		/** @deprecated */
		public $accountId;

		/** @var string */
		public $encryptedAccountId;

		function __construct(Platform $platform, $encryptedAccountId) {
			parent::__construct($platform);

			$this->encryptedAccountId = $encryptedAccountId;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{encryptedAccountId}", $this->encryptedAccountId, $uri);

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