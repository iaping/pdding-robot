<?php

namespace Aping\PddingRobot\Messages\Types\Support;

abstract class ActionCardType
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
     * btnOrientation
     * 0-按钮竖直排列，1-按钮横向排列
     *
     * @var string
     */
    public $btnOrientation;

    /**
     * 按钮竖直排列
     */
    const ORIENTATION_VERTICAL = '0';

    /**
     * 按钮横向排列
     */
    const ORIENTATION_HORIZONTAL = '1';

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

    /**
     * @param string $btnOrientation
     * @return $this
     */
    public function setBtnOrientation(string $btnOrientation)
    {
        $this->btnOrientation = $btnOrientation;

        return $this;
    }

}
