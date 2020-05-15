<?php

namespace Aping\PddingRobot\Messages\Types;

class FeedCardType
{
    /**
     * links
     *
     * @var array
     */
    public $links;

    /**
     * FeedCardType constructor.
     *
     * @param array $links
     */
    public function __construct(array $links)
    {
        $this->setLinks($links);
    }

    /**
     * @param array $links
     * @return $this
     */
    public function setLinks(array $links)
    {
        $this->links = $links;

        return $this;
    }

}
