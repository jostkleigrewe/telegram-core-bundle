<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TelegramService
{
    public function __construct(
        private readonly string $apikey,
        private readonly HttpClientInterface $httpClient
    ) {}

    public function sendMessage(string $chatId, string $message): array
    {
        $response = $this->httpClient->request(
            'POST',
            'https://api.telegram.org/bot'.$this->apikey.'/sendMessage', [
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
        $response = $this->httpClient->request(
            'GET',
            'https://api.telegram.org/bot'.$this->apikey.'/getUpdates', [
        ]);

//        $responseA = [$response];

        return $response->toArray();
    }
}