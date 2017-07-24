<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 06:15
	 */

	namespace RiotQuest\Dto;

	class DateTime extends \DateTime implements \JsonSerializable
	{
		/** @var bool */
		protected $isZero;

		function __construct($timestamp) {
			if (!$timestamp) {
				$this->isZero = true;
			} else {
				parent::__construct('@' . substr($timestamp, 0, 10));
				$this->setTimezone(new \DateTimeZone('Asia/Seoul'));
			}
		}

		public function isZero() {
			return $this->isZero;
		}

		/**
		 * 0이면 null 을 리턴.
		 *
		 * @param string $format
		 *
		 * @return null|string
		 */
		public function format($format) {
			if ($this->isZero) {
				return null;
			} else {
				return parent::format($format);
			}
		}

		/**
		 * Specify data which should be serialized to JSON
		 * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
		 * @return mixed data which can be serialized by <b>json_encode</b>,
		 * which is a value of any type other than a resource.
		 * @since 5.4.0
		 */
		function jsonSerialize() {
			return $this->isZero() ? 0 : $this->getTimestamp();
		}
	}