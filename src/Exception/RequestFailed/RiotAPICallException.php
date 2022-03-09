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
	use GuzzleHttp\Exception\RequestException;
    use GuzzleHttp\Exception\GuzzleException;

	class RiotAPICallException extends UnknownException
	{
		private $exception = null;

		function __construct(
            $message = null,
            GuzzleException $guzzleException
		) {
			parent::__construct($message, $guzzleException->getCode());

			$this->exception = $guzzleException;
		}

		public function getResponseBody() {
			if (!($response = $this->exception->getResponse())) {
				return null;
			}

			return $response->getBody();
		}

		public function getResponseShortBody() {
            if ($this->exception instanceof RequestException) {
                return mb_strimwidth($this->getResponseBody(), 0, 100, '...');
            }

            return null;
		}

		/**
		 * @return string
		 */
		public function getRequestURI() {
			return (string) $this->exception->getRequest()->getUri();
		}

        /**
         * @param GuzzleException $exception
         *
         * @param $debugInfo
         * @return RiotAPICallException
         */
		public static function ByGuzzleException(GuzzleException $exception, $debugInfo) {

            if ($exception instanceof ConnectException) {
                return new RequestConnectException($exception->getMessage(), $exception);
            } elseif ($exception instanceof RequestException) {
                $response = $exception->getResponse();
				if (400 <= $response->getStatusCode() && $response->getStatusCode() <= 499) {
					switch($response->getStatusCode()) {
						case 404:
							return new Request404Exception($exception->getMessage(), $exception);
							break;

						case 429:
                            return new Request429LimitExceedException($exception->getMessage(), $exception);
                            break;

                        // 403 에러는 확인이 필요해서 디버깅용 메세지를 추가함
                        case 403:
                            return new \RiotQuest\Exception\RequestFailed\RequestException($exception->getMessage()." / ".$debugInfo, $exception);
                            break;

						default:
							return new \RiotQuest\Exception\RequestFailed\RequestException($exception->getMessage(), $exception);
					}
				} elseif ($response->getStatusCode() >= 500) {
					return new ServerException($exception->getMessage(), $exception);
				} else {
					return new \RiotQuest\Exception\RequestFailed\RequestException($exception->getMessage(), $exception);
				}
			} else {
				return new RiotAPICallException($exception->getMessage(), $exception);
			}
		}
	}