<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:34
	 */

	namespace RiotQuest\RequestMethod\Champion;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\Champion\ChampionListDto;
	use RiotQuest\RequestMethod\Request;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Champions extends RequestMethodAbstract
	{
		public $freeToPlay = null;

		public function getRequest() {
			$uri = "https://" . $this->platform->apiHost . "" . EndPoint::CHAMPION__CHAMPIONS;

			$query = static::buildParams([
				                             'freeToPlay' => $this->freeToPlay
			                             ]);

			if (strlen($query) > 0) {
				$uri .= "?{$query}";
			}
			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody());

			$mapper = new JsonMapper();

			return $mapper->map($json, new ChampionListDto());
		}
	}