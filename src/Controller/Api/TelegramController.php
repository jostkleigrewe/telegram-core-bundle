<?php

namespace Jostkleigrewe\TelegramCoreBundle\Controller\Api;

use App\Dto\Tests\TestMappingDto;
use Jostkleigrewe\TelegramCoreBundle\Service\TelegramService;
use Jostkleigrewe\TelegramCoreBundle\Service\TelegramWebhookService;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag(name: 'telegram')]
//#[IsGranted('ROLE_USER')]
class TelegramController extends AbstractController
{


    public function __construct(
//        private readonly TelegramService $telegramService,
        private readonly  TelegramWebhookService $telegramWebhookService,
    )
    {

    }

    #[Route('/api/telegram/updates', name: 'app_api_telegram_updates', methods: ['POST'])]
    public function telegramAction(): JsonResponse
    {
        return $this->telegramWebhookService->getResponseForUpdates();
    }






}
