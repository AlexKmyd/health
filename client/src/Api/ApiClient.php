<?php


namespace App\Api;


use App\Api\Requests\AbstractRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\RequestOptions;
use JMS\Serializer\SerializerInterface;

class ApiClient
{
    protected $client;

    protected $serializer;

    public function __construct(Configuration $configuration, SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        $this->client = new Client([
            'base_uri' => $configuration->getBaseUrl()
        ]);
    }

    public function request(AbstractRequest $request)
    {
        try{
            $options = [
                RequestOptions::HEADERS => $this->getHeaders(),
                RequestOptions::BODY => $this->serializer->serialize($request, 'json')
            ];
            $response =  $this->client->request($request->getMethod(), $request->getUri(), $options);
            return $this->resolver(
                $response->getBody()->getContents(),
                $response->getStatusCode()
            );
        } catch (ClientException|ServerException $e){
            if ($e->getResponse()){
                return $this->resolver(
                    $e->getResponse()->getBody()->getContents(),
                    $e->getResponse()->getStatusCode()
                );
            } else {
                throw new \Exception($e->getMessage());
            }
        } catch (\Throwable $e){
            return $this->resolver($e->getMessage(), $e->getCode());
        }
    }

    protected function resolver($content, $status)
    {
        return new Resolver($this->serializer, $content, $status);
    }

    protected function getHeaders()
    {
        return [
            'Content-Type' => 'application/json'
        ];
    }
}