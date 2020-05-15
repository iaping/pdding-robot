<?php

namespace Aping\PddingRobot\Messages;

use Aping\PddingRobot\Messages\Types\LinkType;

class LinkMessage extends Message
{
    /**
     * @var string
     */
    public $msgtype = 'link';

    /**
     * @var LinkType
     */
    public $link;

    /**
     * LinkMessage constructor.
     *
     * @param LinkType $link
     */
    public function __construct(LinkType $link)
    {
        $this->setLink($link);
    }

    /**
     * @param LinkType $link
     * @return $this
     */
    public function setLink(LinkType $link)
    {
        $this->link = $link;

        return $this;
    }
}
