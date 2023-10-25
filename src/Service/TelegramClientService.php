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

    /**
     * @param int $chatId
     * @param string $message
     * @return array
     * @link https://core.telegram.org/bots/api#sendphoto
     */
    public function sendPhoto(int $chatId, string $message): array
    {

        $file = dirname(__DIR__, 5) . '/_tmp/test2.png';
        $fileHandle = fopen($file, 'r');

        $headers = [
            'Content-Type' => 'multipart/form-data',
        ];

        $response = $this->telegramClient->request(
            'POST',
            'sendPhoto', [
            'headers' => $headers,
            'body' => [
                'chat_id' => $chatId,
                'photo' => $fileHandle,
                'caption' => $message,
            ]
        ]);

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