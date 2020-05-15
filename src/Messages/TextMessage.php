<?php

namespace Aping\PddingRobot\Messages;

use Aping\PddingRobot\Messages\Support\At;
use Aping\PddingRobot\Messages\Support\AtTrait;
use Aping\PddingRobot\Messages\Types\TextType;

class TextMessage extends Message
{
    use AtTrait;

    /**
     * @var string
     */
    public $msgtype = 'text';

    /**
     * @var TextType
     */
    public $text;

    /**
     * TextMessage constructor.
     *
     * @param TextType $text
     * @param At|null $at
     */
    public function __construct(TextType $text, At $at)
    {
        $this->setText($text)->setAt($at);
    }

    /**
     * @param TextType $text
     * @return $this
     */
    public function setText(TextType $text)
    {
        $this->text = $text;

        return $this;
    }

}
