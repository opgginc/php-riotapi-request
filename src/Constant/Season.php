<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-14
	 * Time: 05:20
	 */

	namespace RiotQuest\Constant;

	use RiotQuest\Exception\UnknownSeasonException;

	class Season
	{
		const PRESEASON3 = 0;
		const SEASON3 = 1;
		const PRESEASON2014 = 2;
		const SEASON2014 = 3;
		const PRESEASON2015 = 4;
		const SEASON2015 = 5;
		const PRESEASON2016 = 6;
		const SEASON2016 = 7;
		const PRESEASON2017 = 8;
		const SEASON2017 = 9;
		const PRESEASON2018 = 10;
		const SEASON2018 = 11;
		const PRESEASON2019 = 12;
		const SEASON2019 = 13;
		const PRESEASON2020 = 14;
		const SEASON2020 = 15;
		const PRESEASON2021 = 16;
		const SEASON2021 = 17;
		const PRESEASON2022 = 18;
		const SEASON2022 = 19;

		protected static function Map() {
			return [
				static::PRESEASON3    => "PRESEASON3",
				static::SEASON3       => "SEASON3",
				static::PRESEASON2014 => "PRESEASON2014",
				static::SEASON2014    => "SEASON2014",
				static::PRESEASON2015 => "PRESEASON2015",
				static::SEASON2015    => "SEASON2015",
				static::PRESEASON2016 => "PRESEASON2016",
				static::SEASON2016    => "SEASON2016",
				static::PRESEASON2017 => "PRESEASON2017",
				static::SEASON2017    => "SEASON2017",
				static::PRESEASON2018 => "PRESEASON2018",
				static::SEASON2018    => "SEASON2018",
				static::PRESEASON2019 => "PRESEASON2019",
				static::SEASON2019    => "SEASON2019",
				static::PRESEASON2020 => "PRESEASON2020",
				static::SEASON2020    => "SEASON2020",
				static::PRESEASON2021 => "PRESEASON2021",
				static::SEASON2021    => "SEASON2021",
                static::PRESEASON2022 => "PRESEASON2022",
                static::SEASON2022    => "SEASON2022",
			];
		}

		public static function getSeasonName($seasonId) {
			$map = static::Map();

			if (isset($map[$seasonId])) {
				return $map[$seasonId];
			}

			throw new UnknownSeasonException("'" . $seasonId . "' is unknown season id.");
		}
	}