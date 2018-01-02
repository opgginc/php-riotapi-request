<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-26
	 * Time: 02:10
	 */

	namespace RiotQuest\Constant;

	class Platform
	{
		/**
		 * @var string
		 * @deprecated
		 */
		public $region;

		/** @var string */
		public $platform, $apiHost;

		/**
		 * @return Platform[]
		 */
		public static function getAll() {
			return [
				static::BR(),
				static::EUNE(),
				static::EUW(),
				static::JP(),
				static::KR(),
				static::LAN(),
				static::LAS(),
				static::NA(),
				static::OCE(),
				static::TR(),
				static::RU(),
				static::PBE(),
			];
		}

		public static function BR() {
			$platform           = new static();
			$platform->region   = 'BR';
			$platform->platform = 'BR1';
			$platform->apiHost  = 'br1.api.riotgames.com';
			return $platform;
		}

		public static function EUNE() {
			$platform           = new static();
			$platform->region   = 'EUNE';
			$platform->platform = 'EUN1';
			$platform->apiHost  = 'eun1.api.riotgames.com';
			return $platform;
		}

		public static function EUW() {
			$platform           = new static();
			$platform->region   = 'EUW';
			$platform->platform = 'EUW1';
			$platform->apiHost  = 'euw1.api.riotgames.com';
			return $platform;
		}

		public static function JP() {
			$platform           = new static();
			$platform->region   = 'JP';
			$platform->platform = 'JP1';
			$platform->apiHost  = 'jp1.api.riotgames.com';
			return $platform;
		}

		public static function KR() {
			$platform           = new static();
			$platform->region   = 'KR';
			$platform->platform = 'KR';
			$platform->apiHost  = 'kr.api.riotgames.com';
			return $platform;
		}

		public static function LAN() {
			$platform           = new static();
			$platform->region   = 'LAN';
			$platform->platform = 'LA1';
			$platform->apiHost  = 'la1.api.riotgames.com';
			return $platform;
		}

		public static function LAS() {
			$platform           = new static();
			$platform->region   = 'LAS';
			$platform->platform = 'LA2';
			$platform->apiHost  = 'la2.api.riotgames.com';
			return $platform;
		}

		public static function NA() {
			$platform           = new static();
			$platform->region   = 'NA';
			$platform->platform = 'NA1';
			$platform->apiHost  = 'na1.api.riotgames.com';
			return $platform;
		}

		public static function OCE() {
			$platform           = new static();
			$platform->region   = 'OCE';
			$platform->platform = 'OC1';
			$platform->apiHost  = 'oc1.api.riotgames.com';
			return $platform;
		}

		public static function TR() {
			$platform           = new static();
			$platform->region   = 'TR';
			$platform->platform = 'TR1';
			$platform->apiHost  = 'tr1.api.riotgames.com';
			return $platform;
		}

		public static function RU() {
			$platform           = new static();
			$platform->region   = 'RU';
			$platform->platform = 'RU';
			$platform->apiHost  = 'ru.api.riotgames.com';
			return $platform;
		}

		public static function PBE() {
			$platform           = new static();
			$platform->region   = 'PBE';
			$platform->platform = 'PBE1';
			$platform->apiHost  = 'pbe1.api.riotgames.com';
			return $platform;
		}
	}