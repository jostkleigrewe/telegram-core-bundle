<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

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
        return $this->telegramClient->request(
            $requestDto->getMethod(),
            $requestDto->getUrl(),
            $requestDto->getOptions());
    }

    /**
     * @link https://core.telegram.org/bots/api#sendphoto
     * @throws TransportExceptionInterface
     */
    public function sendPhoto(
        int $chatId,
        string $fileName,
        ?string $caption = null): ResponseInterface
    {
        $fileHandle = fopen($fileName, 'r');

        $response = $this->telegramClient->request(
            'POST',
            'sendPhoto', [
            'headers' => [
                'Content-Type' => 'multipart/form-data',
            ],
            'body' => [
                'chat_id' => $chatId,
                'photo' => $fileHandle,
                'caption' => $caption,
            ]
        ]);

        fclose($fileHandle);

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