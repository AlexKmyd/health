<?php


namespace App\Api\Requests;


class AbstractRequest
{
    public function __construct(array $config = [])
    {
        foreach ($config as $key => $value){
            if (property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }
}