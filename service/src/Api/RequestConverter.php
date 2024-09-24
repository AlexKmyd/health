<?php


namespace App\Api;


use Symfony\Component\HttpFoundation\Request;

class RequestConverter
{

    public function convert(Request $request, string $class)
    {
        try{
            switch ($request->getRequestFormat()){
                case 'json':
                    return new $class(json_decode($request->getContent(), true));
                    break;
                //
            }
            throw new \Exception("Undefined format");
        } catch (\Throwable $e){
            var_dump($e->getMessage());
            return new $class;
        }
    }
}