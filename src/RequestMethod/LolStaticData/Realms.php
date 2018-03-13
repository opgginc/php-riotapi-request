<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 19:12
	 */

	namespace RiotQuest\RequestMethod\LolStaticData;

	use GuzzleHttp\Psr7\Response;
	use JsonMapper;
	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Realm\RealmDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;

	class Realms extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA__PROFILE_ICONS;

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();
			return $mapper->map($json, new RealmDto());
		}
	}