<?php

namespace Aping\PddingRobot\Messages;

abstract class Message
{
    /**
     * message type
     * text | link | markdown | actionCard | feedCard
     *
     * @var string
     */
    public $msgtype;

    /**
     * self json encode
     *
     * @return false|string
     */
    public function __toString()
    {
        return json_encode($this);
    }

}
