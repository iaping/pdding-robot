<?php

namespace Aping\PddingRobot\Messages\Types;

use Aping\PddingRobot\Messages\Types\Support\ActionCardType;

class MultiActionCardType extends ActionCardType
{
    /**
     * btns
     * 按钮的信息：title-按钮方案，actionURL-点击按钮触发的URL
     *
     * @var array
     */
    public $btns;

    /**
     * ActionCardType constructor.
     *
     * @param string $title
     * @param string $text
     * @param array $btns
     * @param string $btnOrientation
     */
    public function __construct(string $title,
                                string $text,
                                array $btns = [],
                                string $btnOrientation = self::ORIENTATION_VERTICAL)
    {
        $this->setTitle($title)
            ->setText($text)
            ->setBtns($btns)
            ->setBtnOrientation($btnOrientation);
    }

    /**
     * @param array $btns
     * @return $this
     */
    public function setBtns(array $btns)
    {
        $this->btns = $btns;

        return $this;
    }

}
