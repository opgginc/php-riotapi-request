<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-09
	 * Time: 15:46
	 */

	namespace RiotQuest\Exception\RequestFailed;

	use RiotQuest\Exception\UnknownException;
	use GuzzleHttp\Exception\ConnectException;

	class RiotAPICallException extends UnknownException
	{
		/** @var \GuzzleHttp\Exception\RequestException */
		private $requestException = null;

		function __construct(
			$message = null,
			\GuzzleHttp\Exception\RequestException $requestException
		) {
			parent::__construct($message, $requestException->getCode());

			$this->requestException = $requestException;
		}

		public function getResponseBody() {
			if (!($response = $this->requestException->getResponse())) {
				return null;
			}

			return $response->getBody();
		}

		public function getResponseShortBody() {
			return mb_strimwidth($this->getResponseBody(), 0, 100, '...');
		}

		/**
		 * @return string
		 */
		public function getRequestURI() {
			return (string) $this->requestException->getRequest()->getUri();
		}

		/**
		 * @param \GuzzleHttp\Exception\RequestException $requestException
		 *
		 * @return RiotAPICallException
		 */
		public static function ByGuzzleRequestException(\GuzzleHttp\Exception\RequestException $requestException, $shortApiKey) {
			if ($response = $requestException->getResponse()) {
				if (400 <= $response->getStatusCode() && $response->getStatusCode() <= 499) {
					switch($response->getStatusCode()) {
						case 404:
							return new Request404Exception($requestException->getMessage(), $requestException);
							break;

						case 429:
							return new Request429LimitExceedException($requestException->getMessage(), $requestException);
							break;

						// 403 Forbidden Error에 대한 구분 처리 추가 (디버깅용)
                        case 403:
                            return new \RiotQuest\Exception\RequestFailed\RequestException($requestException->getMessage()."/ API Key last value : ".$shortApiKey, $requestException);
                            break;

						default:
							return new \RiotQuest\Exception\RequestFailed\RequestException($requestException->getMessage(), $requestException);
					}
				} elseif ($response->getStatusCode() >= 500) {
					return new ServerException($requestException->getMessage(), $requestException);
				} else {
					return new \RiotQuest\Exception\RequestFailed\RequestException($requestException->getMessage(), $requestException);
				}
			} elseif ($requestException instanceof ConnectException) {
				return new RequestConnectException($requestException->getMessage(), $requestException);
			} else {
				return new RiotAPICallException($requestException->getMessage(), $requestException);
			}
		}
	}