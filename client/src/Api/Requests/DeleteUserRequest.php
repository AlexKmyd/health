<?php


namespace App\Api\Requests;


class DeleteUserRequest extends AbstractRequest
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getMethod(): string
    {
        return "DELETE";
    }

    public function getUri(): string
    {
        return "api/user/$this->id";
    }
}