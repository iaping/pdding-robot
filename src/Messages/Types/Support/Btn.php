<?php

namespace Aping\PddingRobot\Messages\Types\Support;

class Btn
{
    /**
     * title
     * 按钮方案
     *
     * @var string
     */
    public $title;

    /**
     * actionURL
     * 点击按钮触发的URL
     * @var string
     */
    public $actionURL;

    /**
     * Btn constructor.
     *
     * @param string $title
     * @param string $actionURL
     */
    public function __construct(string $title, string $actionURL)
    {
        $this->setTitle($title)->setActionURL($actionURL);
    }

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
     * @param string $actionURL
     * @return $this
     */
    public function setActionURL(string $actionURL)
    {
        $this->actionURL = $actionURL;

        return $this;
    }

}
