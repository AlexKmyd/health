<?php


namespace App\Api\Requests;


class GetUserRequest extends AbstractRequest
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getMethod(): string
    {
        return "GET";
    }

    public function getUri(): string
    {
        return "/api/user/{$this->id}";
    }
}