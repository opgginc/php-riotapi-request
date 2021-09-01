<?php
	namespace RiotQuest\RequestMethod\MatchV5;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
    use RiotQuest\Constant\Region;
    use RiotQuest\Dto\MatchV5\TimelineDto;
    use RiotQuest\Exception\UnknownException;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class TimelineById extends RequestMethodAbstract
	{
		public $path = EndPoint::MATCHV5__TIMELINE_BY_MATCHID;

		public $matchId;

		function __construct(Platform $platform, $matchId) {
            parent::setPlatform(Platform::convertContinentPlatform($platform));

            if (in_array(explode('_', $matchId)[0], Region::$ORIGIN_REGIONS)) {
                $this->matchId = $matchId;
            } else {
                $this->matchId = $platform->region . '_' . $matchId;
            }
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{matchId}", $this->matchId, $uri);

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$sizeLimit = 1024 * 2000;

			$responseBody = $response->getBody();
			$responseSize = strlen($responseBody);
			if ($responseSize > $sizeLimit) {
				$responseBody = null;
				throw new UnknownException("Timeline response data is too big. size = " . $responseSize);
			}
			$json = \GuzzleHttp\json_decode($responseBody);

			$mapper = new JsonMapper();

			/** @var TimelineDto $object */
			$object = $mapper->map($json, new TimelineDto());
			return $object;
		}
	}