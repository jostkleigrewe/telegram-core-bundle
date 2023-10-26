<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class TelegramClientService
{
    public function __construct(
        private readonly HttpClientInterface $telegramClient,
    ) {}

    /**
     * @link https://core.telegram.org/bots/api#sendmessage
     * @throws TransportExceptionInterface
     */
    public function sendMessage(
        int $chatId,
        string $text): ResponseInterface
    {
        return $this->telegramClient->request(
            'POST',
            'sendMessage', [
            'json' => [
                'chat_id' => $chatId,
                'text' => $text,
            ],
        ]);
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
     * @link https://core.telegram.org/bots/api#getupdates
     * @throws TransportExceptionInterface
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