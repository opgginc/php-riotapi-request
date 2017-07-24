<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-06-30
	 * Time: 08:50
	 */

	namespace RiotQuest\Dto\Spectator;

	use RiotQuest\Dto\BaseDto;

	class Observer extends BaseDto
	{
		/** @var string    Key used to decrypt the spectator grid game data for playback */
		public $encryptionKey;
	}