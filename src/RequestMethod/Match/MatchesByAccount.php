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

	class MatchesByAccount extends RequestMethodAbstract
	{
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
			$uri = "https://" . $this->platform->apiHost . "" . EndPoint::MATCH__LIST_BY_ACCOUNT;
			$uri = str_replace("{accountId}", $this->accountId, $uri);

			$query = http_build_query([
				                          'beginTime'  => ($this->beginTime ? $this->beginTime->getTimestamp() * 1000 : null),
				                          'endTime'    => ($this->endTime ? $this->endTime->getTimestamp() * 1000 : null),
				                          'beginIndex' => $this->beginIndex,
				                          'endIndex'   => $this->endIndex,
				                          'queue'      => $this->queue,
				                          'season'     => $this->season,
				                          'champion'   => $this->champion,
			                          ]);

			if (strlen($query) > 0) {
				$uri .= "?{$query}";
			}

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