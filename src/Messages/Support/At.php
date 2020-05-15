<?php

namespace Aping\PddingRobot\Messages\Support;

class At
{
    /**
     * 被@人的手机号(在text内容里要有@手机号)
     *
     * @var array
     */
    public $atMobiles = [];

    /**
     * @所有人时：true，否则为：false
     *
     * @var bool
     */
    public $isAtAll = true;

    /**
     * At constructor.
     *
     * @param array $atMobiles
     */
    public function __construct(array $atMobiles = [])
    {
        $this->setAtMobiles($atMobiles);
    }

    /**
     * @param array $atMobiles
     * @return $this
     */
    public function setAtMobiles(array $atMobiles = [])
    {
        $this->atMobiles = $atMobiles;

        if (count($this->atMobiles)) {
            $this->setIsAtAll(false);
        }

        return $this;
    }

    /**
     * @param bool $isAtAll
     * @return $this
     */
    protected function setIsAtAll(bool $isAtAll)
    {
        $this->isAtAll = $isAtAll;

        return $this;
    }

}
