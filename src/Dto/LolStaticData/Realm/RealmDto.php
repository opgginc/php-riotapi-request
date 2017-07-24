<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:14
	 */

	namespace RiotQuest\Dto\LolStaticData\Realm;

	use RiotQuest\Dto\BaseDto;

	class RealmDto extends BaseDto
	{
		/** @var string    Legacy script mode for IE6 or older. */
		public $lg;
		/** @var string    Latest changed version of Dragon Magic. */
		public $dd;
		/** @var string    Default language for this realm. */
		public $l;
		/** @var string[]    Latest changed version for each data type listed. */
		public $n;
		/** @var int    Special behavior number identifying the largest profile icon ID that can be used under 500. Any profile icon that is requested between this number and 500 should be mapped to 0. */
		public $profileiconmax;
		/** @var string    Additional API data drawn from other sources that may be related to Data Dragon functionality. */
		public $store;
		/** @var string    Current version of this file for this realm. */
		public $v;
		/** @var string    The base CDN URL. */
		public $cdn;
		/** @var string    Latest changed version of Dragon Magic's CSS file. */
		public $css;
	}