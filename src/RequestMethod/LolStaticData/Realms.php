<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 19:12
	 */

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Realm\RealmDto;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Realms extends RequestMethodAbstract
	{
		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . EndPoint::LOL_STATIC_DATA__PROFILE_ICONS;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();
			return $mapper->map($json, new RealmDto());
		}
	}