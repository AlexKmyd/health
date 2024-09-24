<?php


namespace App\Api;


use App\Api\Responses\AbstractResponse;
use JMS\Serializer\SerializerInterface;

class Resolver
{
    /**
     * @var string|null
     */
    protected $content;

    /**
     * @var int
     */
    protected $code;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    protected $format = 'json';

    public function __construct(SerializerInterface $serializer, ?string $content, $code)
    {
        $this->serializer = $serializer;
        $this->content = $content;
        $this->code = $code;
        var_dump($this->content);
    }

    /**
     * @param string $format
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    public function resolve(AbstractResponse $response)
    {
        try{
            $response = $this->serializer->deserialize($this->content, get_class($response), $this->format);
            $this->code == 200 ? $response->setSuccess(true): $response->setSuccess(false);
        } catch (\Throwable $e){
            $response->setSuccess(false);
            $response->setMessage($e->getMessage());
        }
        $response->setCode($this->code);
        return $response;
    }
}