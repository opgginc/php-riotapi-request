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
		public static $API_HOST_PH = 'ph.api.riotgames.com';
		public static $API_SCHEME_PH = 'https';

		/**
		 * @var string
		 * @deprecated
		 */
		public $region;

		/** @var string */
		public $platform, $apiHost, $apiScheme = 'https';

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
//				static::SG(),
//				static::ID(),
//				static::PH(),
//				static::TW(),
//				static::VN(),
//				static::TH(),
				static::AMERICAS(),
				static::ASIA(),
				static::EUROPE(),
			];
		}

		public static function BR() {
			$platform            = new static();
			$platform->region    = Region::BR;
			$platform->platform  = 'BR1';
			$platform->apiHost   = 'br1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function EUNE() {
			$platform            = new static();
			$platform->region    = Region::EUNE;
			$platform->platform  = 'EUN1';
			$platform->apiHost   = 'eun1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function EUW() {
			$platform            = new static();
			$platform->region    = Region::EUW;
			$platform->platform  = 'EUW1';
			$platform->apiHost   = 'euw1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function JP() {
			$platform            = new static();
			$platform->region    = Region::JP;
			$platform->platform  = 'JP1';
			$platform->apiHost   = 'jp1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function KR() {
			$platform            = new static();
			$platform->region    = Region::KR;
			$platform->platform  = 'KR';
			$platform->apiHost   = 'kr.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function LAN() {
			$platform            = new static();
			$platform->region    = Region::LAN;
			$platform->platform  = 'LA1';
			$platform->apiHost   = 'la1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function LAS() {
			$platform            = new static();
			$platform->region    = Region::LAS;
			$platform->platform  = 'LA2';
			$platform->apiHost   = 'la2.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function NA() {
			$platform            = new static();
			$platform->region    = Region::NA;
			$platform->platform  = 'NA1';
			$platform->apiHost   = 'na1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function OCE() {
			$platform            = new static();
			$platform->region    = Region::OCE;
			$platform->platform  = 'OC1';
			$platform->apiHost   = 'oc1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function TR() {
			$platform            = new static();
			$platform->region    = Region::TR;
			$platform->platform  = 'TR1';
			$platform->apiHost   = 'tr1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function RU() {
			$platform            = new static();
			$platform->region    = Region::RU;
			$platform->platform  = 'RU';
			$platform->apiHost   = 'ru.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function SG() {
			$platform            = new static();
			$platform->region    = Region::SG;
			$platform->platform  = 'SG';
			$platform->apiHost   = 'sg.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function ID() {
			$platform            = new static();
			$platform->region    = Region::ID;
			$platform->platform  = 'ID';
			$platform->apiHost   = 'id1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function PH() {
			$platform            = new static();
			$platform->region    = Region::PH;
			$platform->platform  = 'PH';
			$platform->apiHost   = static::$API_HOST_PH;
			$platform->apiScheme = 'static::$API_SCHEME_PH';
			return $platform;
		}

		public static function TW() {
			$platform            = new static();
			$platform->region    = Region::TW;
			$platform->platform  = 'TW';
			$platform->apiHost   = 'tw.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function VN() {
			$platform            = new static();
			$platform->region    = Region::VN;
			$platform->platform  = 'VN';
			$platform->apiHost   = 'vn.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function TH() {
			$platform            = new static();
			$platform->region    = Region::TH;
			$platform->platform  = 'TH';
			$platform->apiHost   = 'th.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

		public static function PBE() {
			$platform            = new static();
			$platform->region    = Region::PBE;
			$platform->platform  = 'PBE1';
			$platform->apiHost   = 'pbe1.api.riotgames.com';
			$platform->apiScheme = 'https';
			return $platform;
		}

        public static function AMERICAS() {
            $platform            = new static();
            $platform->platform  = Region::AMERICAS;
            $platform->apiHost   = 'americas.api.riotgames.com';
            $platform->apiScheme = 'https';
            return $platform;
        }

        public static function ASIA() {
            $platform            = new static();
            $platform->platform  = Region::ASIA;
            $platform->apiHost   = 'asia.api.riotgames.com';
            $platform->apiScheme = 'https';
            return $platform;
        }

        public static function EUROPE() {
            $platform            = new static();
            $platform->platform  = Region::EUROPE;
            $platform->apiHost   = 'europe.api.riotgames.com';
            $platform->apiScheme = 'https';
            return $platform;
        }

        public static function convertContinentPlatform(Platform $platform) {
            $continent = Region::findContinentByRegion($platform->region);
            if ($continent) {
                return self::$continent()->setRegion($platform->region);
            }
            return $platform;
        }

        public function setRegion($region) {
		    $this->region = $region;
		    return $this;
        }
	}