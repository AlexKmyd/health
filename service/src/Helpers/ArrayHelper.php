<?php


namespace App\Helpers;


class ArrayHelper
{
    public static function toArray(object $object)
    {
        $a = new \ArrayObject();
        $a->append($object);
        var_dump(get_object_vars($object));die;
    }
}