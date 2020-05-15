<?php

namespace Aping\PddingRobot\Messages\Support;

trait AtTrait
{
    /**
     * @var At
     */
    public $at;

    /**
     * @param At $at
     * @return $this
     */
    public function setAt(At $at)
    {
        $this->at = $at;

        return $this;
    }

}
