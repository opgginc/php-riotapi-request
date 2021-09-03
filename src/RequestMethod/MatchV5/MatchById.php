<?php
	namespace RiotQuest\RequestMethod\MatchV5;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Constant\Platform;
    use RiotQuest\Constant\Region;
    use RiotQuest\Dto\MatchV5\MatchDto;
    use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class MatchById extends RequestMethodAbstract
	{
		public $path = EndPoint::MATCHV5__BY_MATCHID;

		public $matchId;

		function __construct(Platform $platform, $matchId) {
            parent::setPlatform(Platform::convertContinentPlatform($platform));

            if (count(explode('_', $matchId)) > 1) {
			    $this->matchId = $matchId;
            } else {
                $this->matchId = $platform->platform . '_' . $matchId;
            }
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{matchId}", $this->matchId, $uri);

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