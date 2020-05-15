<?php

namespace Aping\PddingRobot\Responses;

class Response
{
    /**
     * @var int
     */
    public $code;

    /**
     * @var string
     */
    public $error;

    /**
     * @var string
     */
    public $raw;

    /**
     * Response constructor.
     *
     * @param int $code
     * @param string $error
     * @param string $raw
     */
    public function __construct(int $code, string $error, string $raw = '')
    {
        $this->code = $code;
        $this->error = $error;
        $this->raw = $raw;
    }

    /**
     * is success
     *
     * @return bool
     */
    public function isOk()
    {
        return $this->code == 0;
    }

    /**
     * error message
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getRaw()
    {
        return $this->raw;
    }

}
