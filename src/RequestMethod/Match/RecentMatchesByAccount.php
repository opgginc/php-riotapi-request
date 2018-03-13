<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 03:41
	 */

	namespace RiotQuest\RequestMethod\Match;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\Match\MatchlistDto;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class RecentMatchesByAccount extends RequestMethodAbstract
	{
		public $path = EndPoint::MATCH__RECENT_LIST_BY_ACCOUNT;

		public $accountId;

		/** @var \DateTime */
		public $beginTime, $endTime;

		/** @var integer */
		public $queue, $season, $champion;

		/** @var integer */
		public $beginIndex, $endIndex;

		function __construct(Platform $platform, $accountId) {
			parent::__construct($platform);

			$this->accountId = $accountId;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{accountId}", $this->accountId, $uri);

			return $this->getPsr7Request('GET', $uri);
		}


		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			/** @var MatchlistDto $object */
			$object = $mapper->map($json, new MatchlistDto());
			return $object;
		}
	}