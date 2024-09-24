<?php


namespace App\Api\Requests;


abstract class AbstractRequest
{
    abstract public function getMethod():string;

    abstract public function getUri():string;
}