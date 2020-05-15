<?php

namespace Aping\PddingRobot\Messages;

use Aping\PddingRobot\Messages\Types\SingleActionCardType;

class SingleActionCardMessage extends Message
{
    /**
     * @var string
     */
    public $msgtype = 'actionCard';

    /**
     * @var SingleActionCardType
     */
    public $actionCard;

    /**
     * SingleActionCardMessage constructor.
     *
     * @param SingleActionCardType $singleActionCard
     */
    public function __construct(SingleActionCardType $singleActionCard)
    {
        $this->setActionCard($singleActionCard);
    }

    /**
     * @param SingleActionCardType $actionCard
     * @return $this
     */
    public function setActionCard(SingleActionCardType $actionCard)
    {
        $this->actionCard = $actionCard;

        return $this;
    }

}
