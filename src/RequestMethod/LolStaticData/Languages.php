<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:56
	 */

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\LanguageListDto;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Languages extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA__LANGUAGES;

		/** @var string */
		public $locale, $version;

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . $this->path;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper                  = new JsonMapper();
			$mapper->bEnforceMapType = false;
			return $mapper->map($json, new LanguageListDto());
		}
	}