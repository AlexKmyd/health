<?php


namespace App\Api\Responses;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractResponse
 * @package App\Api\Responses
 * @JMS\ExclusionPolicy ("all")
 */
class AbstractResponse
{
    #[JMS\Expose]
    #[JMS\SerializedName("success")]
    #[JMS\Type("boolean")]
    protected $success = false;

    #[JMS\Expose]
    #[JMS\SerializedName("code")]
    #[JMS\Type("int")]
    protected $code;

    #[JMS\Expose]
    #[JMS\SerializedName("message")]
    #[JMS\Type("string")]
    protected $message = '';

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }
}