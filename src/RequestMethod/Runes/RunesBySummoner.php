<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:53
	 */

	namespace RiotQuest\RequestMethod\Runes;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\Runes\RunePagesDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class RunesBySummoner extends RequestMethodAbstract
	{
		public $summonerId;

		function __construct(Platform $platform, $summonerId) {
			parent::__construct($platform);

			$this->summonerId = $summonerId;
		}

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . EndPoint::RUNES__BY_SUMMONER;
			$uri = str_replace("{summonerId}", $this->summonerId, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			return $mapper->map($json, new RunePagesDto());
		}
	}