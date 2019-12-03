<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 04:36
	 */

	namespace RiotQuest;

	use RiotQuest\Exception\RequestFailed\RiotAPICallException;
	use RiotQuest\Exception\UnknownException;
	use RiotQuest\RequestMethod\RequestMethodAbstract;
	use GuzzleHttp\Client;
	use GuzzleHttp\Exception\RequestException;
	use GuzzleHttp\Psr7\Request;
	use GuzzleHttp\Psr7\Response;
	use GuzzleHttp\RequestOptions;
	use GuzzleHttp\TransferStats;

	/**
	 * Class AsyncRequest
	 * @package RiotQuest
	 *
	 * @method onSuccess;
	 */
	class AsyncRequest
	{
		/** @var RequestMethodAbstract */
		public $requestMethod;

		/** @var Request */
		public $request;

		/** @var callable */
		public $callbackDone, $callbackFail;

		////////////////////
		// 아래 두개의 변수는 내부가 아닌 외부에서 접근해서 기록해야한다.

		/** @var bool */
		public $markFinished = false;

		/** @var int */
		public $tried = 0;

		function __construct(RequestMethodAbstract $requestMethod, Request $request, callable $cb1 = null, callable $cb2 = null) {
			if ($cb1 === null) {
				$cb1 = function () {
					throw new UnknownException("onDone 메소드가 존재하지 않습니다. 이 메소드는 필수입니다.");
				};
			}

			if ($cb2 === null) {
				$cb2 = function (RiotAPICallException $exception) {
					// 콜백이 지정되지 않았을 경우 간단하게 실패 사유를 출력해준다.
					$message = "리퀘스트가 실패하였습니다. (Code: {$exception->getCode()}, Request URI: {$exception->getRequestURI()})";
					if ($shortBody = $exception->getResponseShortBody()) {
						$message .= "\r\nBody: {$shortBody})";
					}

					throw $exception;
				};
			}

			$this->requestMethod = $requestMethod;
			$this->request       = $request;
			$this->callbackDone  = $cb1;
			$this->callbackFail  = $cb2;
		}

		public function onDone(Response $response) {
			EventDispatcher::fire(EventDispatcher::EVENT_REQUEST_SUCCESS__BEFORE_CALLBACK, [$response, $this]);

			// Dto 로 바꿔서 던져준다.
			$cb  = $this->callbackDone;
			$res = $cb($this->requestMethod->mapping($response));

			EventDispatcher::fire(EventDispatcher::EVENT_REQUEST_SUCCESS__AFTER_CALLBACK, [$this]);
			return $res;
		}

		public function onFail(RequestException $requestException, $shortApiKey) {

			$exception = RiotAPICallException::ByGuzzleRequestException($requestException, $shortApiKey);

			EventDispatcher::fire(EventDispatcher::EVENT_REQUEST_FAIL__BEFORE_CALLBACK, [$exception]);

			$cb  = $this->callbackFail;
			$res = $cb($exception, $shortApiKey);  // 사실상 $cb(콜백)을 호출하면 아래 스크립트는 동작하지 않고 종료 된다.

			// 위에서 콜백함수를 실행시켜 아래 EventDispatcher 및 return 코드는 도달하지 않는다.
			EventDispatcher::fire(EventDispatcher::EVENT_REQUEST_FAIL__AFTER_CALLBACK, [$this]);
			return $res;
		}

		/**
		 * @param Client $client
		 *
		 * @return \GuzzleHttp\Promise\PromiseInterface
		 */
		public function getPromise(Client $client) {
			return $client->sendAsync($this->request, [
				RequestOptions::ON_STATS => function (TransferStats $stats) {
					EventDispatcher::fire(EventDispatcher::EVENT_REQUEST_ONSTATS, [$stats]);
				}
			]);
		}
	}