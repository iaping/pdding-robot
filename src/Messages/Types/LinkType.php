<?php

namespace Aping\PddingRobot\Messages\Types;

use Aping\PddingRobot\Messages\Types\Support\LinkTrait;

class LinkType
{
    use LinkTrait;

    /**
     * text
     * 消息内容。如果太长只会部分展示
     *
     * @var string
     */
    public $text;

    /**
     * LinkType constructor.
     *
     * @param string $title
     * @param string $text
     * @param string $messageUrl
     * @param string $picUrl
     */
    public function __construct(string $title,
                                string $text,
                                string $messageUrl,
                                string $picUrl = '')
    {
        $this->setTitle($title)
            ->setText($text)
            ->setMessageUrl($messageUrl)
            ->setPicUrl($picUrl);
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

}
