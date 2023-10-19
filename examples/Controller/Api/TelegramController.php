<?php

namespace Jostkleigrewe\examples\Controller\Api;

//use App\Dto\Tests\TestMappingDto;
use Jostkleigrewe\TelegramCoreBundle\Service\TelegramWebhookService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

//use OpenApi\Attributes as OA;

//#[OA\Tag(name: 'telegram')]
//#[IsGranted('ROLE_USER')]
//class TelegramController extends AbstractController
class TelegramController
{


    public function __construct(
//        private readonly TelegramService $telegramService,
        private readonly  TelegramWebhookService $telegramWebhookService,
    )
    {

    }

    #[Route('/api/telegram/updates', name: 'telegram_core_api_telegram_updates', methods: ['POST'])]
    public function telegramAction(): JsonResponse
    {
        return $this->telegramWebhookService->getResponseForUpdates();
    }






}