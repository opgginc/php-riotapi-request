<?php

    namespace RiotQuest\Dto\MatchV5;

    class TimelineDetailDto extends MetadataWrapDto
    {
        /** @var int */
        public $frameInterval;
        /** @var FrameDto[] */
        public $frames;
        /** @var int */
        public $gameId;
        /** @var ParticipantDto[] */
        public $participants;
    }