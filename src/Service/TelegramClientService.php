<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use App\Repository\Telegram\TelegramLogWebhookRepository;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TelegramClientService
{
    public function __construct(
        private readonly HttpClientInterface $telegramClient,
        private readonly RequestStack $requestStack,
        private readonly TelegramLogWebhookRepository $telegramLogWebhookRepository,

    ) {}

    public function sendMessage(int $chatId, string $message): array
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