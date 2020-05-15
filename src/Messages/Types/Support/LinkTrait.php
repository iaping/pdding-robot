<?php

namespace Aping\PddingRobot\Messages\Types\Support;

trait LinkTrait
{
    /**
     * title
     * 消息标题
     *
     * @var string
     */
    public $title;

    /**
     * messageUrl
     * 点击消息跳转的URL
     *
     * @var string
     */
    public $messageUrl;

    /**
     * picUrl
     * 图片URL
     *
     * @var string
     */
    public $picUrl = '';

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $messageUrl
     * @return $this
     */
    public function setMessageUrl(string $messageUrl)
    {
        $this->messageUrl = $messageUrl;

        return $this;
    }

    /**
     * @param string $picUrl
     * @return $this
     */
    public function setPicUrl(string $picUrl)
    {
        $this->picUrl = $picUrl;

        return $this;
    }

}
