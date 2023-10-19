<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Jostkleigrewe\TelegramCoreBundle\Entity\TelegramLogWebhook;
use Jostkleigrewe\TelegramCoreBundle\Form\TelegramLogWebhookType;
use Jostkleigrewe\TelegramCoreBundle\Repository\TelegramLogWebhookRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TelegramCoreService
{
    public function __construct(
        private readonly HttpClientInterface $telegramClient,
        private readonly RequestStack $requestStack,
        private readonly TelegramLogWebhookRepository $telegramLogWebhookRepository,

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