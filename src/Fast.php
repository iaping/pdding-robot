<?php

namespace Aping\PddingRobot;

use Aping\PddingRobot\Messages\FeedCardMessage;
use Aping\PddingRobot\Messages\LinkMessage;
use Aping\PddingRobot\Messages\MarkdownMessage;
use Aping\PddingRobot\Messages\MultiActionCardMessage;
use Aping\PddingRobot\Messages\SingleActionCardMessage;
use Aping\PddingRobot\Messages\Support\At;
use Aping\PddingRobot\Messages\TextMessage;
use Aping\PddingRobot\Messages\Types\FeedCardType;
use Aping\PddingRobot\Messages\Types\LinkType;
use Aping\PddingRobot\Messages\Types\MarkdownType;
use Aping\PddingRobot\Messages\Types\MultiActionCardType;
use Aping\PddingRobot\Messages\Types\SingleActionCardType;
use Aping\PddingRobot\Messages\Types\Support\Btn;
use Aping\PddingRobot\Messages\Types\Support\Link;
use Aping\PddingRobot\Messages\Types\TextType;

class Fast
{
    /**
     * @var Fast
     */
    private static $instance;

    /**
     * @var DingRobot
     */
    private $robot;

    /**
     * @param string $token
     * @param string $secret
     * @return Fast
     */
    public static function new(string $token, string $secret)
    {
        if (! static::$instance instanceof static) {
            static::$instance = new static($token, $secret);
        }

        return static::$instance;
    }

    /**
     * send Text message
     *
     * @param string $content
     * @param array $atMobiles
     * @return Responses\Response
     * @throws Exceptions\HttpException
     * @throws Exceptions\UnknownResponseException
     */
    public function sendText(string $content, array $atMobiles = [])
    {
        $message = new TextMessage(new TextType($content), new At($atMobiles));

        return $this->robot->send($message);
    }

    /**
     * send Link message
     *
     * @param string $title
     * @param string $text
     * @param string $messageUrl
     * @param string $picUrl
     * @return Responses\Response
     * @throws Exceptions\HttpException
     * @throws Exceptions\UnknownResponseException
     */
    public function sendLink(string $title, string $text, string $messageUrl, string $picUrl = '')
    {
        $message = new LinkMessage(new LinkType($title, $text, $messageUrl, $picUrl));

        return $this->robot->send($message);
    }

    /**
     * send Markdown message
     *
     * @param string $title
     * @param string $text
     * @param array $atMobiles
     * @return Responses\Response
     * @throws Exceptions\HttpException
     * @throws Exceptions\UnknownResponseException
     */
    public function sendMarkdown(string $title, string $text, array $atMobiles = [])
    {
        $message = new MarkdownMessage(new MarkdownType($title, $text), new At($atMobiles));

        return $this->robot->send($message);
    }

    /**
     * send ActionCard message
     * 整体跳转ActionCard类型
     *
     * @param string $title
     * @param string $text
     * @param string $singleTitle
     * @param string $singleURL
     * @return Responses\Response
     * @throws Exceptions\HttpException
     * @throws Exceptions\UnknownResponseException
     */
    public function sendSingleActionCard(string $title,
                                         string $text,
                                         string $singleTitle,
                                         string $singleURL)
    {
        $message = new SingleActionCardMessage(new SingleActionCardType($title, $text, $singleTitle, $singleURL));

        return $this->robot->send($message);
    }

    /**
     * send ActionCard message
     * 独立跳转ActionCard类型
     *
     * @param string $title
     * @param string $text
     * @param array $btnInfo [['title'=>'','actionURL'=>''], ['title'=>'','actionURL'=>'']]
     * @param string $btnOrientation
     * @return Responses\Response
     * @throws Exceptions\HttpException
     * @throws Exceptions\UnknownResponseException
     */
    public function sendMultiActionCard(string $title,
                                        string $text,
                                        array $btnInfo = [],
                                        string $btnOrientation = MultiActionCardType::ORIENTATION_VERTICAL)
    {
        $btns = [];

        foreach ($btnInfo as $btn) {
            if (isset($btn['title']) && $btn['actionURL']) {
                $btns[] = new Btn($btn['title'], $btn['actionURL']);
            }
        }

        $message = new MultiActionCardMessage(new MultiActionCardType($title, $text, $btns, $btnOrientation));

        return $this->robot->send($message);
    }

    /**
     * send FeedCard message
     *
     * @param array $linkInfo [['title'=>'','messageUrl'=>'', 'picUrl'=>''], ['title'=>'','messageUrl'=>'', 'picUrl'=>'']]
     * @return Responses\Response
     * @throws Exceptions\HttpException
     * @throws Exceptions\UnknownResponseException
     */
    public function sendFeedCard(array $linkInfo)
    {
        $links = [];

        foreach ($linkInfo as $link) {
            if (isset($link['title']) && $link['messageUrl'] && $link['picUrl']) {
                $links[] = new Link($link['title'], $link['messageUrl'], $link['picUrl']);
            }
        }

        $message = new FeedCardMessage(new FeedCardType($links));

        return $this->robot->send($message);
    }

    /**
     * Fast constructor.
     *
     * @param string $token
     * @param string $secret
     */
    private function __construct(string $token, string $secret)
    {
        $this->robot = new DingRobot($token, $secret);
    }

    private function __clone() {}

}
