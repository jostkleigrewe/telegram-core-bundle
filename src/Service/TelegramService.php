<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TelegramService
{
    public function __construct(
        private readonly HttpClientInterface $telegramClient
    ) {}

    public function sendMessage(string $chatId, string $message): array
    {

        $response = $this->telegramClient->request(
            'POST',
            'sendMessage', [
            'json' => [
                'chat_id' => $chatId,
                'text' => $message,
            ],
        ]);

//        $responseA = [$response];

        return $response->toArray();
    }

    public function getUpdates(): array
    {
        $response = $this->telegramClient->request(
            'GET',
            'getUpdates', [
        ]);

//        $responseA = [$response];

        return $response->toArray();
    }
}