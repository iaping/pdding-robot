<?php

namespace Aping\PddingRobot\Messages;

use Aping\PddingRobot\Messages\Types\MultiActionCardType;

class MultiActionCardMessage extends Message
{
    /**
     * @var string
     */
    public $msgtype = 'actionCard';

    /**
     * @var MultiActionCardType
     */
    public $actionCard;

    /**
     * MultiActionCardMessage constructor.
     *
     * @param MultiActionCardType $singleActionCard
     */
    public function __construct(MultiActionCardType $singleActionCard)
    {
        $this->setActionCard($singleActionCard);
    }

    /**
     * @param MultiActionCardType $actionCard
     * @return $this
     */
    public function setActionCard(MultiActionCardType $actionCard)
    {
        $this->actionCard = $actionCard;

        return $this;
    }

}
