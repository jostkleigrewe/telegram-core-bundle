<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Telegram\TelegramLogWebhook;
use App\Form\Telegram\TelegramLogWebhookType;
use App\Repository\Telegram\TelegramLogWebhookRepository;
use Jostkleigrewe\OpenAiCoreBundle\Service\OpenAiService;
use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Response\UpdateResponse;
use Jostkleigrewe\TelegramCoreBundle\Manager\TelegramCoreManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use DateTimeImmutable;

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

  


         public function blah(UpdateRequest $updateRequestDTO): JsonResponse
    {
        try {


            $messageText = $updateRequestDTO->getMessage()->getText();

            if ($messageText === '/start') {
                $this->telegramClientService->sendMessage(
                    $updateRequestDTO->getMessage()->getChat()->getId(),
                    'Hallo. Ich bin der Bot von Sven'
                );
            }

            if (substr($messageText, 0, 8) === '/repeat ') {
                $this->telegramClientService->sendMessage(
                    $updateRequestDTO->getMessage()->getChat()->getId(),
                    'Repeat: ' . substr($messageText, 8)
                );
            }

            if ($messageText === '/ping') {
                $this->telegramClientService->sendMessage(
                    $updateRequestDTO->getMessage()->getChat()->getId(),
                    'Pong'
                );
            }

            if (substr($messageText, 0, 4) === '/ai ') {

                $result = $this->openAiService->sendMessage(substr($messageText, 4));
                $answer = 'Antwort von KI: ' . $result["choices"][0]["message"]["content"];

                $this->telegramClientService->sendMessage(
                    $updateRequestDTO->getMessage()->getChat()->getId(),
                    $answer
                );
            }

            if ($messageText === '/commands') {
                $msg = 'Commands: ' . PHP_EOL;

                foreach ($this->manager->getChatCommmandService()->getChatCommandCollection()->yieldHandlers() as $handler) {
                    $msg .= get_class($handler) . ' ' . PHP_EOL;

                }


                $this->telegramClientService->sendMessage(
                    $updateRequestDTO->getMessage()->getChat()->getId(),
                    $msg
                );
            }

            //
//            $session = $this->getAlexaCoreManager()->getAlexaSession();
//
//            //  get intent by symfony-request
//            $intent = $this->getAlexaCoreManager()->getIntentService()->getIntent();
//
//            //  execute intent
//            $this->getAlexaCoreManager()
//                ->getIntentService()
//                ->executeIntent($intent)
//            ;
        } catch (\Throwable $e) {
//
//            //  create new response by throwable
//            $this->getAlexaCoreManager()
//                ->getAlexaResponseService()
//                ->updateAlexaResponseByThrowable($e);
        }
//
//        //  get response-object
//        $alexaResponse = $this->getAlexaCoreManager()->getAlexaResponse();
//


//        //  create and return json-response


        $responseDto = new UpdateResponse();
        $responseDto->setUpdateRequest($updateRequestDTO);


        $alexaResponseSerialized = $this->serializer->serialize(
            $responseDto, 'json',
            [
                AbstractObjectNormalizer::SKIP_NULL_VALUES => true
            ]
        );


        $statusCode = $responseDto->getStatusCode();
        $additionalHeaders = [];
        return JsonResponse::fromJsonString($alexaResponseSerialized, $statusCode, $additionalHeaders)
            ->setSharedMaxAge(300);
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


//    /**
//     * @return Request
//     */
//    private function getSymfonyRequest(): Request
//    {
//        $currentRequest = $this->requestStack->getCurrentRequest();
//
//        if ($currentRequest === null) {
//            throw new \LogicException('Current symfony-request is missing');
//        }
//
//        return $currentRequest;
//    }
}    
    
    