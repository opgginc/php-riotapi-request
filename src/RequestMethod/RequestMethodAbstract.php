<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 03:42
	 */

	namespace RiotQuest\RequestMethod;

	use RiotQuest\Constant\Platform;
	use RiotQuest\Dto\BaseArrayDto;
	use RiotQuest\Dto\BaseDto;
	use RiotQuest\Exception\RequiredParameterNotFilledException;
	use GuzzleHttp\Psr7\Request;
	use GuzzleHttp\Psr7\Response;

	/**
	 * RiotAPI 는 EndPoint 와 Method 는 존재하지만, 기본적으로 이를 정확히 구분하여 네이밍을 짓고 있지는 않다.
	 * 그러므로 이 구조에서 폴더명등은 마음대로 지어도 된다.
	 *
	 * Class RequestMethodAbstract
	 * @package RiotQuest\RequestMethod
	 */
	abstract class RequestMethodAbstract
	{
		/** @var Platform */
		protected $platform;

		public function __construct(Platform $platform) {
			$this->setPlatform($platform);
		}

		protected function setPlatform(Platform $platform) {
			$this->platform = $platform;
		}

		/**
		 * @param       $method
		 * @param       $uri
		 * @param array $headers
		 * @param null  $body
		 *
		 * @return Request
		 * @throws RequiredParameterNotFilledException
		 */
		protected function getPsr7Request($method, $uri, $headers = [], $body = null) {
			// { 나 } 가 남아있으면 파라미터가 치환 안된 상태임. 수정 필요.
			if (strpos($uri, '{') !== false || strpos($uri, '}') !== false) {
				throw new RequiredParameterNotFilledException("URI 에 아직 파라미터가 채워지지 않은 것이 있습니다. (You tried: {$uri})");
			}

			return new Request($method, $uri, $headers, $body);
		}

		/**
		 * @return Request
		 */
		abstract public function getRequest();

		/**
		 * @param $params
		 *
		 * @return string
		 */
		protected static function buildParams(array $params = null) {
			$parameter = [];

			foreach ($params as $key => $val) {
				if ($val === null) {
					// null 이면 패스
				} elseif (is_array($val) || is_object($val)) {
					// 표준: key[]=abc&key[]=fff&key[]=rrr
					// RiotAPI: key=abc&key=fff&key=rrr
					foreach ($val as $_val) {
						$parameter[] = urlencode($key) . "=" . urlencode((string) $_val);
					}
				} elseif ($val === true) {
					$parameter[] = urlencode($key) . "=true";
				} elseif ($val === false) {
					$parameter[] = urlencode($key) . "=false";
				} else {
					$parameter[] = urlencode($key) . "=" . urlencode((string) $val);
				}
			}

			return implode('&', $parameter);
		}

		/**
		 * @param Response $response
		 *
		 * @return mixed|BaseDto|BaseArrayDto|array
		 */
		abstract public function mapping(Response $response);
	}