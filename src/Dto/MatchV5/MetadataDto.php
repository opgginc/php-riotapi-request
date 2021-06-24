<?php

    namespace RiotQuest\Dto\MatchV5;

    use RiotQuest\Dto\BaseDto;

    class MetadataDto extends BaseDto
    {
        /** @var string */
        public $dataVersion;
        /** @var string */
        public $matchId;
        /** @var array */
        public $participants;

        public function getRegion() {
            return explode('_', $this->matchId)[0];
        }

        public function getGameId() {
            return explode('_', $this->matchId)[1];
        }
    }
