<?php

namespace Aping\PddingRobot\Messages\Types\Support;

class Link
{
    use LinkTrait;

    /**
     * Link constructor.
     *
     * @param string $title
     * @param string $messageUrl
     * @param string $picUrl
     */
    public function __construct(string $title,
                                string $messageUrl,
                                string $picUrl)
    {
        $this->setTitle($title)
            ->setMessageUrl($messageUrl)
            ->setPicUrl($picUrl);
    }

}
