<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-02
	 * Time: 04:43
	 */

	namespace RiotQuest\RequestMethod\LolStaticData;

	use RiotQuest\Constant\EndPoint;
	use RiotQuest\Dto\LolStaticData\Item\ItemListDto;
	use RiotQuest\Dto\LolStaticData\Item\ItemDto;
	use RiotQuest\Dto\LolStaticData\Item\ItemTreeDto;
	use RiotQuest\Dto\LolStaticData\Item\GroupDto;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Psr7\Response;
	use JsonMapper;

	class Items extends RequestMethodAbstract
	{
		public $path = EndPoint::LOL_STATIC_DATA_DDRAGON_ITEMS;

		/** @var string */
		public $locale, $version;

		public function getRequest() {
			$uri = $this->platform->apiScheme . "://" . EndPoint::LOL_STATIC_DATA_DDRAGON_HOST . "/cdn/{$this->version}/data/{$this->locale}" . $this->path;

			return $this->getPsr7Request('GET', $uri);
		}

		public function mapping(Response $response) {
			$json = \GuzzleHttp\json_decode($response->getBody(), true);

			$itemList          = new ItemListDto();
			$itemList->version = $json['version'];
			$itemList->type    = $json['type'];
			$itemList->data    = [];
			$itemList->tree    = [];
			$itemList->groups  = [];

			$mapper                  = new JsonMapper();
			$mapper->bEnforceMapType = false;

			foreach ($json['data'] as $itemKey => $itemRow) {
				$jsonItemRow = json_decode(json_encode($itemRow), true);

				/** @var ItemDto $itemDto */
				$itemDto = $mapper->map($jsonItemRow, new ItemDto());
				if ($itemDto != null) {
					$itemDto->id                   = (int) $itemKey;
					$itemDto->sanitizedDescription = $itemDto->description;
					$itemList->data[$itemKey]      = $itemDto;
				}
			}

			foreach ($json['tree'] as $treeRow) {
				$jsonTreeRow = json_decode(json_encode($treeRow), true);

				/** @var ItemTreeDto $treeDto */
				$treeDto          = $mapper->map($jsonTreeRow, new ItemTreeDto());
				$itemList->tree[] = $treeDto;
			}

			foreach ($json['groups'] as $groupRow) {
				$jsonGroupRow = json_decode(json_encode($groupRow), true);

				$jsonGroupRow['key'] = $jsonGroupRow['id'];
				unset($jsonGroupRow['id']);

				/** @var GroupDto $groupDto */
				$groupDto           = $mapper->map($jsonGroupRow, new GroupDto());
				$itemList->groups[] = $groupDto;
			}

			return $itemList;
		}
	}