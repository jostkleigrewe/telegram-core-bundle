<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message;
use Jostkleigrewe\TelegramCoreBundle\Dto\Requests\RequestInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

readonly class TelegramClientService
{
    public function __construct(
        private readonly HttpClientInterface $telegramClient,
    ) {}

    /**
     * @link https://core.telegram.org/bots/api
     * @throws TransportExceptionInterface
     */
    public function sendRequest(
       RequestInterface $requestDto): ResponseInterface
    {
        $response = $this->telegramClient->request(
            $requestDto->getMethod(),
            $requestDto->getUrl(),
            $requestDto->getOptions());


//        $responseMessage = unserialize(
//            $response->getContent(), Message::class
//        );


//        if (201 !== $response->getStatusCode()) {
//            throw new Exception('Response status code is different than expected.');
//        }

//        $responseJson = $response->getContent();
//        $responseData = json_decode($responseJson, true, 512, JSON_THROW_ON_ERROR);

        return $response;
    }
    
    /**
     * @link   https://core.telegram.org/bots/api#getupdates
     * @throws TransportExceptionInterface
     * @return array
     * @throws TransportExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     */
    public function getUpdates(): array
    {
        $response = $this->telegramClient->request(
            'GET',
            'getUpdates', [
        ]);

        return $response->toArray();
    }
}