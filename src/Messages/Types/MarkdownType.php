<?php

namespace Aping\PddingRobot\Messages\Types;

class MarkdownType
{
    /**
     * title
     * 首屏会话透出的展示内容
     *
     * @var string
     */
    public $title;

    /**
     * text
     * markdown格式的消息
     *
     * @var string
     */
    public $text;

    /**
     * MarkdownType constructor.
     *
     * @param string $title
     * @param string $text
     */
    public function __construct(string $title, string $text)
    {
        $this->setTitle($title)->setText($text);
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
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;

        return $this;
    }

}
