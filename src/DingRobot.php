<?php

namespace Aping\PddingRobot;

use Aping\PddingRobot\Exceptions\HttpException;
use Aping\PddingRobot\Exceptions\UnknownResponseException;
use Aping\PddingRobot\Messages\Message;
use Aping\PddingRobot\Responses\Response;

class DingRobot
{
    /**
     * version
     * @var string
     */
    const VERSION = 'pdding-robot/dev';

    /**
     * robot webhook
     * @var string
     */
    protected $hook = 'https://oapi.dingtalk.com/robot/send';

    /**
     * robot token
     * @var string
     */
    protected $token = '';

    /**
     * secret
     *
     * @var string
     */
    protected $secret = '';

    /**
     * DingRobot constructor.
     *
     * @param string $token
     * @param string $secret
     */
    public function __construct(string $token, string $secret)
    {
        $this->token = $token;
        $this->secret = $secret;
    }

    /**
     * signature
     *
     * @param string $millisecond
     * @return string
     */
    protected function sign(string $millisecond)
    {
        $signString = $millisecond . "\n" . $this->secret;
        $hash = hash_hmac('sha256', $signString, $this->secret, true);

        return base64_encode($hash);
    }

    /**
     * millisecond
     *
     * @return float
     */
    protected function millisecond()
    {
        list($msec, $sec) = explode(' ', microtime());

        return (float) sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    }

    /**
     * build webhook url
     *
     * @return string
     */
    protected function buildWebHook()
    {
        $params = [
            'access_token' => $this->token,
            'timestamp' => $millisecond = $this->millisecond(),
            'sign' => $this->sign($millisecond),
        ];

        return sprintf('%s?%s', $this->hook, http_build_query($params));
    }

    /**
     * send message
     *
     * @param Message $message
     * @return Response
     * @throws HttpException
     * @throws UnknownResponseException
     */
    public function send(Message $message)
    {
        $raw = $this->post($this->buildWebHook(), (string) $message);
        $std = json_decode($raw, false);

        if (property_exists($std, 'errcode')
            && property_exists($std, 'errmsg')) {
            return new Response((int) $std->errcode, $std->errmsg, $raw);
        }

        if (property_exists($std, 'status')
            && property_exists($std, 'punish')) {
            return new Response((int) $std->status, sprintf('Server punish: %s', $std->punish), $raw);
        }

        throw new UnknownResponseException('Unable to parse server data.');
    }

    /**
     * post request
     *
     * @param string $url
     * @param string $postFields
     * @return bool|string
     * @throws HttpException
     */
    protected function post(string $url, string $postFields = '')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_USERAGENT, sprintf('%s %s',
            static::VERSION,
            'https://github.com/iaping/pdding-robot'));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json;charset=utf-8',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new HttpException(curl_error($ch));
        }
        if (($code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE)) != 200) {
            throw new HttpException(sprintf('error http code: %d', $code));
        }
        curl_close($ch);

        return $response;
    }

}
