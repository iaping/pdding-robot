<?php

namespace Aping\PddingRobot\Messages\Types;

use Aping\PddingRobot\Messages\Types\Support\ActionCardType;

class SingleActionCardType extends ActionCardType
{
    /**
     * singleTitle
     * 单个按钮的方案。(设置此项和singleURL后btns无效)
     *
     * @var string
     */
    public $singleTitle;

    /**
     * singleURL
     * 点击singleTitle按钮触发的URL
     * 
     * @var string
     */
    public $singleURL;

    /**
     * ActionCardType constructor.
     *
     * @param string $title
     * @param string $text
     * @param string $singleTitle
     * @param string $singleURL
     */
    public function __construct(string $title,
                                string $text,
                                string $singleTitle,
                                string $singleURL)
    {
        $this->setTitle($title)
            ->setText($text)
            ->setSingleTitle($singleTitle)
            ->setSingleURL($singleURL);
    }

    /**
     * @param string $singleTitle
     * @return $this
     */
    public function setSingleTitle(string $singleTitle)
    {
        $this->singleTitle = $singleTitle;

        return $this;
    }

    /**
     * @param string $singleURL
     * @return $this
     */
    public function setSingleURL(string $singleURL)
    {
        $this->singleURL = $singleURL;

        return $this;
    }

}
