<?php

namespace Aping\PddingRobot\Messages\Types;

class TextType
{
    /**
     * text content
     * 消息内容
     *
     * @var string
     */
    public $content = '';

    /**
     * TextType constructor.
     *
     * @param string $content
     */
    public function __construct(string $content)
    {
        $this->setContent($content);
    }

    /**
     * set text content
     *
     * @param string $content
     * @return $this
     */
    public function setContent(string $content)
    {
        $this->content = $content;

        return $this;
    }

}
