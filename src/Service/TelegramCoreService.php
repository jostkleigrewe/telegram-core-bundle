<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use App\Entity\Telegram\TelegramLogWebhook;
use App\Form\Telegram\TelegramLogWebhookType;
use App\Repository\Telegram\TelegramLogWebhookRepository;
use Jostkleigrewe\OpenAiCoreBundle\Service\OpenAiService;
use Jostkleigrewe\TelegramCoreBundle\Manager\TelegramCoreManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Service for Telegram-Webhook
 */
 class TelegramCoreService
{
    public function __construct(
        private readonly TelegramCoreManager $manager,
        private readonly SerializerInterface $serializer,
        private readonly TelegramClientService     $telegramClientService,
        private readonly OpenAiService              $openAiService,

//        private readonly RequestStack $requestStack,
//        private readonly EntityManagerInterface $entityManager,
    )
    {
    }

    public function getResponse(): JsonResponse
    {

    }

  


  



//    /**
//     * Persist the data from the request into the database
//     */
//    public function getResponseForUpdate(Update $updateDTO): JsonResponse
//    {
//
//        //  JSON ohne null-Werte
//        $updateJSON = $this->symfonySerializer->serialize(
//            $updateDTO,
//            'json',
//            [
//                AbstractObjectNormalizer::SKIP_NULL_VALUES => true
//            ]
//        );
//
//        $this->logUpdateToDatabase($updateDTO);
//
//        $this->telegramWebhookService->
//
//
//
//
//        return new JsonResponse([
//            "ok" => true,
//            "updateJSON" => $updateJSON,
//
//        ]);
//    }
//
//    private function logUpdateToDatabase(Update $updateDTO): void
//    {
//
//        //  JSON ohne null-Werte
//        $updateJSON = $this->symfonySerializer->serialize(
//            $updateDTO,
//            'json',
//            [
//                AbstractObjectNormalizer::SKIP_NULL_VALUES => true
//            ]
//        );
//
//        $telegramLogWebhook = new TelegramLogWebhook();
//        $telegramLogWebhook->setData($updateJSON);
//        $telegramLogWebhook->setCreatedAt(new \DateTimeImmutable());
//
//        $this->entityManager->persist($telegramLogWebhook);
//        $this->entityManager->flush();
//    }
//
//
//


}    
    
    