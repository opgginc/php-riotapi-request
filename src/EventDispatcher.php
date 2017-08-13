<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-05
	 * Time: 21:12
	 */

	namespace RiotQuest;

	use GuzzleHttp\Psr7\Request;

	/**
	 * Class EventDispatcher
	 * @package RiotQuest
	 */
	class EventDispatcher
	{
		/**
		 * @see \GuzzleHttp\Psr7\Response param1
		 * @see \GuzzleHttp\Psr7\Request  param2
		 */
		const EVENT_REQUEST_SUCCESS__BEFORE_CALLBACK = 1;

		/**
		 * 재시도 같은거 전부 다 한 후, 최종 실패시
		 * @see \RiotQuest\Exception\RequestFailed\RiotAPICallException param1
		 */
		const EVENT_REQUEST_FAIL__BEFORE_CALLBACK = 2;

		/**
		 * @see \GuzzleHttp\TransferStats param1
		 */
		const EVENT_REQUEST_ONSTATS = 3;

		/**
		 * @see int              param1 (retries)
		 * @see Request          param2
		 */
		const EVENT_REQUEST_RETRIED__BEFORE = 4;

		/**
		 * @see \GuzzleHttp\Psr7\Request  param1
		 */
		const EVENT_REQUEST_SUCCESS__AFTER_CALLBACK = 5;

		/**
		 * @see \GuzzleHttp\Psr7\Request  param1
		 */
		const EVENT_REQUEST_FAIL__AFTER_CALLBACK = 6;

		/**
		 * @see \GuzzleHttp\Psr7\Request  param1
		 */
		const EVENT_EXCEED_RATELIMIT = 7;

		/**
		 * @see Request          param1
		 */
		const EVENT_REQUEST__BEFORE = 9;

		/**
		 * @see string message
		 */
		const EVENT_WARNING_DEPRECATED = 999;

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