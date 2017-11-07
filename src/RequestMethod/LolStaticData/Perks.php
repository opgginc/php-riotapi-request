<?php

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Perk\PerkListDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Perks extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA__PERKS;

		/** @var string */
		public $locale, $version;

		/** @var string[] */
		public $tags = ['all'];

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . $this->path;

			$query = static::buildParams([
				                             'locale'  => $this->locale,
				                             'version' => $this->version,
				                             'tags'    => $this->tags,
			                             ]);

			if (strlen($query) > 0) {
				$uri .= "?{$query}";
			}
			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();
			return $mapper->map($json, new PerkListDto());
		}
	}