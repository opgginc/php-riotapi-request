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
	use RiotQuest\Dto\Match\MatchDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class MatchById extends RequestMethodAbstract
	{
		public $id;

		/** @var integer */
		public $forAccountId;

		function __construct(Platform $platform, $id) {
			parent::__construct($platform);

			$this->id = $id;
		}

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . EndPoint::MATCH__BY_MATCH;
			$uri = str_replace("{matchId}", $this->id, $uri);

			$query = http_build_query([
				                          'forAccountId' => $this->forAccountId
			                          ]);

			if (strlen($query) > 0) {
				$uri .= "?{$query}";
			}

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			/** @var MatchDto $object */
			$object = $mapper->map($json, new MatchDto());
			return $object;
		}
	}