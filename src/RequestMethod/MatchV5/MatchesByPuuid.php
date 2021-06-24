<?php
	namespace RiotQuest\RequestMethod\MatchV5;

	use GuzzleHttp\Psr7\Response;
    use RiotQuest\Constant\EndPoint;
    use RiotQuest\Constant\Platform;
    use RiotQuest\RequestMethod\RequestMethodAbstract;

    class MatchesByPuuid extends RequestMethodAbstract
	{
		public $path = EndPoint::MATCHV5__LIST_BY_PUUID;

		/** @var string */
		public $puuid;

        /** @var int */
        public $start, $count;

		function __construct(Platform $platform, $puuid) {
			parent::setPlatform(Platform::convertContinentPlatform($platform));

			$this->puuid = $puuid;
		}

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;
			$uri = str_replace("{puuid}", $this->puuid, $uri);

            $query = http_build_query([
                'start' => $this->start,
                'count'   => $this->count,
            ]);

            if (strlen($query) > 0) {
                $uri .= "?{$query}";
            }

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
		    /** List[String] */
			return \GuzzleHttp\json_decode($response->getBody());
		}
	}