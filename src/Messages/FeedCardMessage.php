<?php

namespace Aping\PddingRobot\Messages;

use Aping\PddingRobot\Messages\Types\FeedCardType;

class FeedCardMessage extends Message
{
    /**
     * @var string
     */
    public $msgtype = 'feedCard';

    /**
     * @var FeedCardType
     */
    public $feedCard;

    /**
     * FeedCardMessage constructor.
     * @param FeedCardType $feedCard
     */
    public function __construct(FeedCardType $feedCard)
    {
        $this->setFeedCard($feedCard);
    }

    /**
     * @param FeedCardType $feedCard
     * @return $this
     */
    public function setFeedCard(FeedCardType $feedCard)
    {
        $this->feedCard = $feedCard;

        return $this;
    }

}
