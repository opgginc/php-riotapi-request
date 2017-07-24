<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 02:26
	 */

	namespace RiotQuest\Dto;

	/**
	 * RiotAPI는 문서마다 DTO는 제공하지만, 'Riot API 전체를 아우루는' Dto 문서는 존재하지 않다. 그러므로 중복 체크는 우리가 직접 해야한다. (기본적으로 RiotAPI의 Dto 이름을 따라가지만, 중복하는 경우가 나오면 이름을 임의대로 바꾸거나 폴더를 생성하여 네임스페이스를 분리하자. MasteryDto 가 대표적인 중복 DTO)
	 * RiotAPI는 전체를 아우루는 Dto 문서가 존재하지 않기 때문에 폴더 구조를 만드는 것도 큰 의미가 없다. 만들던 말던 전혀 문제 없으니 편한대로, 혹은 기존 규칙을 대충 눈으로 보고 따라가면 된다.
	 *
	 * Class BaseDto
	 * @package RiotQuest\Dto
	 */
	abstract class BaseDto implements \JsonSerializable
	{
		protected $isHideNullValue = false;

		protected function isHideAttribute($key) {
			return in_array($key, [
				'isHideNullValue'
			]);
		}

		/**
		 * Specify data which should be serialized to JSON
		 * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
		 * @return mixed data which can be serialized by <b>json_encode</b>,
		 * which is a value of any type other than a resource.
		 * @since 5.4.0
		 */
		function jsonSerialize() {
			$list = [];
			foreach ($this as $key => $val) {
				if ($this->isHideAttribute($key)) continue;
				if ($this->isHideNullValue === false && $val === null) continue;

				$list[$key] = $val;
			}

			return $list;
		}

		/**
		 * @return array
		 */
		public function toArray() {
			return json_decode($this->toJson(), true);
		}

		public function toJson($options = 0) {
			return json_encode($this, $options);
		}
	}