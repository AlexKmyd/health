<?php


namespace App\Api\Requests;


class CreateGroupRequest extends AbstractRequest
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getMethod(): string
    {
        return "POST";
    }

    public function getUri(): string
    {
        return "api/group";
    }
}