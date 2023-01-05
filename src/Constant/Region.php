<?php

	namespace RiotQuest\Constant;

	class Region
	{
	    // asia
        const KR = 'KR';
        const JP = 'JP';
        const OCE = 'OCE';
        const RU = 'RU';

        // europe
        const TR = 'TR';
        const EUNE = 'EUNE';
        const EUW = 'EUW';

        // america
        const NA = 'NA';
        const LAN = 'LAN';
        const LAS = 'LAS';
        const BR = 'BR';

        // garena
        const PH = 'PH';
        const SG = 'SG';
        const TW = 'TW';
        const TH = 'TH';
        const VN = 'VN';

        // continent
        const AMERICAS = 'AMERICAS';
        const ASIA = 'ASIA';
        const EUROPE = 'EUROPE';
        const SEA = 'SEA';

        // pbe
        const PBE = 'PBE';

        public static $CONTINENT_AMERICA = [
            self::LAS,
            self::LAN,
            self::NA,
            self::BR,
        ];

        public static $CONTINENT_EUROPE = [
            self::TR,
            self::EUNE,
            self::EUW,
            self::RU,
        ];

        public static $CONTINENT_ASIA = [
            self::KR,
            self::JP,
        ];

        public static $CONTINENT_SEA = [
            self::OCE,
            self::PH,
            self::SG,
            self::TW,
            self::TH,
            self::VN
        ];

        public static $ORIGIN_REGIONS = [
            self::LAS,
            self::LAN,
            self::NA,
            self::BR,
            self::OCE,
            self::TR,
            self::EUNE,
            self::EUW,
            self::RU,
            self::KR,
            self::JP,
            
            self::PH,
            self::SG,
            self::TW,
            self::TH,
            self::VN
        ];

        public static function ContinentMap() {
            return [
                self::AMERICAS => self::$CONTINENT_AMERICA,
                self::ASIA => self::$CONTINENT_ASIA,
                self::EUROPE => self::$CONTINENT_EUROPE,
                self::SEA => self::$CONTINENT_SEA,
            ];
        }

        public static function findContinentByRegion($region) {
            foreach (static::ContinentMap() as $continent => $regions) {
                if (in_array($region, $regions)) {
                    return $continent;
                }
            }
            return null;
        }
	}