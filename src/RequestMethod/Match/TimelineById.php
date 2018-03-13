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
	use RiotQuest\Dto\Match\Timeline\MatchTimelineDto;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class TimelineById extends RequestMethodAbstract
	{
		public $path = EndPoint::MATCH__TIMELINE_BY_MATCH;

		public $id;

		function __construct(Platform $platform, $id) {
			parent::__construct($platform);

			$this->id = $id;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{matchId}", $this->id, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			/** @var MatchTimelineDto $object */
			$object = $mapper->map($json, new MatchTimelineDto());
			return $object;
		}
	}