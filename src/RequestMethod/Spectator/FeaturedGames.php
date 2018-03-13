<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:53
	 */

	namespace RiotQuest\RequestMethod\Spectator;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class FeaturedGames extends RequestMethodAbstract
	{
		public $path = EndPoint::SPECTATOR__FEATURED_GAMES;

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . $this->platform->apiHost . "" . $this->path;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			/** @var \RiotQuest\Dto\Spectator\FeaturedGames $object */
			$object = $mapper->map($json, new \RiotQuest\Dto\Spectator\FeaturedGames());
			return $object;
		}
	}