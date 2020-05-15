<?php

namespace Aping\PddingRobot\Messages;

use Aping\PddingRobot\Messages\Support\At;
use Aping\PddingRobot\Messages\Support\AtTrait;
use Aping\PddingRobot\Messages\Types\MarkdownType;

class MarkdownMessage extends Message
{
    use AtTrait;

    /**
     * @var string
     */
    public $msgtype = 'markdown';

    /**
     * @var MarkdownType
     */
    public $markdown;

    /**
     * MarkdownMessage constructor.
     *
     * @param MarkdownType $markdown
     * @param At $at
     */
    public function __construct(MarkdownType $markdown, At $at)
    {
        $this->setMarkdown($markdown)->setAt($at);
    }

    /**
     * @param MarkdownType $markdown
     * @return $this
     */
    public function setMarkdown(MarkdownType $markdown)
    {
        $this->markdown = $markdown;

        return $this;
    }

}
