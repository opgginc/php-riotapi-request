<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 19:19
	 */

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\VersionListDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Versions extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA_DDRAGON_VERSIONS;

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . EndPoint::LOL_STATIC_DATA_DDRAGON_HOST . "/api" . $this->path;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper                  = new JsonMapper();
			$mapper->bEnforceMapType = false;
			return $mapper->map($json, new VersionListDto());
		}
	}