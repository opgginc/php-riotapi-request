<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 03:51
	 */

	namespace RiotQuest;

	use GuzzleHttp\Client;
	use GuzzleHttp\Exception\GuzzleException;
	use GuzzleHttp\Exception\ConnectException;
	use GuzzleHttp\Exception\RequestException;
	use GuzzleHttp\Pool;
	use GuzzleHttp\Psr7\Response;
	use RiotQuest\Dto\BaseArrayDto;
	use RiotQuest\Dto\BaseDto;
	use RiotQuest\Exception\RequestFailed\RiotAPICallException;
	use RiotQuest\Exception\UnknownException;
	use RiotQuest\RequestMethod\RequestMethodAbstract;

	/**
	 * CURL 의 multi request 기능을 통해서 비동기 콜을 한다. 단순히 http 에 대해서만 비동기로 실행된다. 콜백들은 비동기처럼 생겼지만, 실제로는 동기로 작동된다. (2개의 콜백이 동시에 작동되는 경우는 절대 없다. 무조건 하나 끝나야함 => PHP 의 특성)
	 * add 메소드를 통해서 리퀘스트를 추가할 수 있으며, 각 리퀘스트가 종료될 때 마다 onDone 혹은 onFail 이 실행된다.
	 *
	 * Class AsyncRiotAPI
	 * @package RiotQuest
	 */
	class AsyncRiotAPI
	{
		const RETRY_UNLIMITED = -1;

		// Flags for each objects.
		public $isRespectRateLimitHeaders = true;
		public $concurrency = 30;
		public $retryLimits = 5;
		public $requestTimeout = 10.0;
		public $userAgentString = "OP.GG API Client";

		// Member Variables
		protected $apiKey;

		/** @var bool The super important flag for nested callbacks with `add` and `exec` method. This will make throw if user call `add` after `exec` before requests are ended. */
		private $isExecuting = false;

		/** @var AsyncRequest[] */
		protected $requests = [];

		function __construct($apiKey) {
			$this->apiKey = $apiKey;
		}

		/**
		 * @param                       $tried
		 * @param GuzzleException|null $exception
		 *
		 * @return bool
		 */
		protected function shouldRetry($tried, GuzzleException $exception = null) {
			if ($this->retryLimits !== static::RETRY_UNLIMITED && $tried >= $this->retryLimits) {
				// NEED TO WARNING
				return false;
			}

			if ($exception instanceof ConnectException) {
				return true;
			}

			if ($exception instanceof RequestException) {

                $response = $exception->getResponse();

                if ($response === null) {
                    return true;
                }

                if ($response) {
                    if ($response->getStatusCode() >= 500) {
                        return true;
                    }

                    if ($response->getStatusCode() === 429) {
                        EventDispatcher::fire(EventDispatcher::EVENT_EXCEED_RATELIMIT, [
                            $response,
                            $exception->getRequest(),
                        ]);
                        return true;
                    }
                }
            }

			return false;
		}

		public function getNewGuzzleClient() {
			return new Client([
				                  'timeout' => $this->requestTimeout
			                  ]);
		}

		/////////////////////////////
		/// Sync Call
		/**
		 * @param RequestMethodAbstract $requestMethod
		 *
		 * @return BaseDto|BaseArrayDto
		 */
		public function call(RequestMethodAbstract $requestMethod) {
			$result = null;

			$this->add($requestMethod, function ($dto) use (&$result) {
				$result = $dto;
			}, function (RiotAPICallException $exception) {
				throw $exception;
			})->exec();

			return $result;
		}
		///
		/////////////////////////////

		/////////////////////////////
		/// Async Call
		/**
		 * 비동기 콜에 새로운 Request 추가
		 *
		 * @param RequestMethodAbstract $requestMethod
		 * @param callable              $onDone 성공시 실행된다.
		 * @param callable|null         $onFail 실패시 실행된다. HTTP Status 200 이 아닐 때 발생한다.
		 *                                      RequestFailedException will be thrown If you do not make specific this callback.
		 *
		 * @return $this
		 */
		public function add(RequestMethodAbstract $requestMethod, callable $onDone, callable $onFail = null) {
			// Exec 작동중일때는 add 못하게 한다. 버그 방지.
			if ($this->isExecuting === true) {
				throw new UnknownException("You can't add the request when this instance executing. Please make new instance of " . get_class($this) . ".");
			}

			$guzzleRequest = $requestMethod->getRequest();
			$guzzleRequest = $guzzleRequest->withAddedHeader("X-Riot-Token", $this->apiKey);
			$guzzleRequest = $guzzleRequest->withAddedHeader("User-Agent", $this->userAgentString);

			$this->requests[] = new AsyncRequest($requestMethod, $guzzleRequest, $onDone, $onFail);
			return $this;
		}

		/**
		 * 비동기콜 한방에 모두 시작. 모든 콜 완료시 return void.
		 *
		 * @return void
		 */
		public function exec() {
			$client            = $this->getNewGuzzleClient();
			$this->isExecuting = true;

			// 실패한 리퀘스트는 다시 재시도한다.
			while(sizeof($this->requests) > 0) {
				$pool = new Pool($client,
				                 array_map(function (AsyncRequest $asyncRequest) use ($client) {
					                 // 익명함수 만들어야됨: 이해 안되면 guzzlehttp 문서 참조
					                 return (function () use ($asyncRequest, $client) {
						                 // 재시도인 경우에만 이벤트 호출
						                 if ($asyncRequest->tried >= 1) {
							                 EventDispatcher::fire(EventDispatcher::EVENT_REQUEST_RETRIED__BEFORE, [
								                 $asyncRequest->tried + 1,
								                 $asyncRequest
							                 ]);
						                 }

						                 // TODO: MAKE YOU CAN THROW REQUEST EXCEPTION IN THIS EVENT.
						                 EventDispatcher::fire(EventDispatcher::EVENT_REQUEST__BEFORE, [
							                 $asyncRequest
						                 ]);

						                 return $asyncRequest->getPromise($client);
					                 });
				                 }, $this->requests), [
					                 'concurrency' => $this->concurrency,
					                 'fulfilled'   => function (Response $response, $index) {
						                 $this->requests[$index]->tried++;
						                 $this->requests[$index]->markFinished = true;
						                 $this->requests[$index]->onDone($response);
					                 },
					                 'rejected'    => function (GuzzleException $exception, $index) {
						                 $this->requests[$index]->tried++;

						                 // 재시도 할 필요 없으면, 실패 리퀘스트를 날려준다.
						                 if (!$this->shouldRetry($this->requests[$index]->tried, $exception)) {

                                             $ApiKeyLastWord = explode("-", $this->apiKey)[count(explode("-", $this->apiKey))-1];
                                             $debugInfo = $ApiKeyLastWord;

							                 $this->requests[$index]->markFinished = true;
							                 $this->requests[$index]->onFail($exception, $debugInfo);
						                 }
					                 }
				                 ]);

				$promise = $pool->promise();
				$promise->wait();

				$this->clearFinishedRequests();
			}

			$this->clear();
			$this->isExecuting = false;
		}

		/**
		 * 동시 리퀘스트 제한 수를 수정한다. 1을 걸면 동기 리퀘스트나 다름 없다. 30으로 하면 동시에 30개 리퀘스트를 Async 로 처리한다.
		 *
		 * @param $limit
		 *
		 * @return $this
		 */
		public function setConcurrency($limit) {
			$this->concurrency = $limit;
			return $this;
		}

		protected function clearFinishedRequests() {
			$this->requests = array_filter($this->requests, function (AsyncRequest $request) {
				return !$request->markFinished;
			});
		}

		public function clear() {
			$this->requests = [];
		}
		///
		/////////////////////////
	}