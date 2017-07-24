<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 19:04
	 */

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Map\MapDataDto;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Maps extends RequestMethodAbstract
	{
		/** @var string */
		public $locale, $version;

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . EndPoint::LOL_STATIC_DATA__MAPS;

			$query = static::buildParams([
				                             'locale'  => $this->locale,
				                             'version' => $this->version
			                             ]);

			if (strlen($query) > 0) {
				$uri .= "?{$query}";
			}
			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();
			return $mapper->map($json, new MapDataDto());
		}
	}