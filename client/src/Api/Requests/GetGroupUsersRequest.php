<?php


namespace App\Api\Requests;


class GetGroupUsersRequest extends AbstractRequest
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
        return "api/group/users/$this->id";
    }
}