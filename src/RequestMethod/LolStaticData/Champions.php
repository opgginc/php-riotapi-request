<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:43
	 */

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Champion\ChampionListDto;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Champions extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA__CHAMPIONS;

		/** @var string */
		public $locale, $version;

		/** @var string[] */
		public $tags = ['all'];

		/** @var bool If specified as true, the returned data map will use the champions' IDs as the keys. If not specified or specified as false, the returned data map will use the champions' keys instead. */
		public $dataById;

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . $this->path;

			$query = static::buildParams([
				                             'locale'   => $this->locale,
				                             'version'  => $this->version,
				                             'tags'     => $this->tags,
				                             'dataById' => $this->dataById
			                             ]);

			if (strlen($query) > 0) {
				$uri .= "?{$query}";
			}
			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper                  = new JsonMapper();
			$mapper->bEnforceMapType = false;

			return $mapper->map($json, new ChampionListDto());
		}
	}