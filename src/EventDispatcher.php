<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-05
	 * Time: 21:12
	 */

	namespace RiotQuest;

	use GuzzleHttp\Psr7\Request;

	class EventDispatcher
	{
		/**
		 * @see \GuzzleHttp\Psr7\Response param1
		 * @see \GuzzleHttp\Psr7\Request  param2
		 */
		const EVENT_REQUEST_SUCCESS = 1;

		/**
		 * 재시도 같은거 전부 다 한 후, 최종 실패시
		 * @see \RiotQuest\Exception\RequestFailed\RiotAPICallException param1
		 */
		const EVENT_REQUEST_FAIL = 2;

		/**
		 * @see \GuzzleHttp\TransferStats param1
		 */
		const EVENT_REQUEST_ONSTATS = 3;

		/**
		 * @see int              param1 (retries)
		 * @see Request          param2
		 */
		const EVENT_REQUEST_RETRIED = 4;

		/**
		 * @see \GuzzleHttp\Psr7\Request  param1
		 */
		const EVENT_CALLBACK_FINISH_DONE = 5;

		/**
		 * @see \GuzzleHttp\Psr7\Request  param1
		 */
		const EVENT_CALLBACK_FINISH_FAIL = 6;

		/**
		 * @see \GuzzleHttp\Psr7\Request  param1
		 */
		const EVENT_CALLBACK_EXCEED_RATELIMIT = 7;

		/**
		 * @see string message
		 */
		const EVENT_WARNING_DEPRECATED = 8;

		static $events = [];

		public static function fire($eventType, array $params = null) {
			if (!isset(static::$events[$eventType])) {
				return;
			}

			$event = static::$events[$eventType];
			call_user_func_array($event, $params);
		}

		public static function listen($eventType, callable $callback) {
			static::$events[$eventType] = $callback;
		}
	}