<?php


namespace App\Api\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class EditUserRequest
 * @package App\Api\Requests
 * @JMS\ExclusionPolicy ("all")
 */
class EditUserRequest extends CreateUserRequest
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getUri(): string
    {
        return "api/user/{$this->id}";
    }

    public function getMethod(): string
    {
        return "PUT";
    }
}