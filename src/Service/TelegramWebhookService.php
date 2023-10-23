<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;


use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Response\UpdateResponse;
use Jostkleigrewe\TelegramCoreBundle\Exception\TelegramCoreException;
use Jostkleigrewe\TelegramCoreBundle\Manager\TelegramCoreManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class TelegramWebhookService
{

    const REQUEST_FORMAT = 'json';

    private ?UpdateRequest $updateRequest = null;
    
    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly RequestStack $requestStack,
//        private readonly TelegramCoreService $telegramCoreService,
//        private readonly TelegramCoreManager $manager,
        private readonly ChatCommandService $chatCommandService,
    ) {
        
    }

    public function getResponse(): JsonResponse
    {
        $this->getResponseByUpdateRequest(
            $this->createUpdateRequestBySymfonyRequest()
        );
    }

    public function getResponseByUpdateRequest(UpdateRequest $updateRequestDTO): JsonResponse
    {

        dump(__METHOD__);

//        try {
            // get chat-command by update-request
            $chatCommmand = $this->chatCommandService
                ->findChatCommandByUpdateRequest($updateRequestDTO);

            if ($chatCommmand === null) {
                throw new TelegramCoreException(
                    'No chat-command found for update-request.'
                );
            }

        $response = $chatCommmand->createResponse($updateRequestDTO);


        dump($response);


            die;








            if (substr($messageText, 0, 4) === '/ai ') {

                $result = $this->openAiService->sendMessage(substr($messageText, 4));
                $answer = 'Antwort von KI: ' . $result["choices"][0]["message"]["content"];

                $this->telegramCoreService->sendMessage(
                    $updateRequestDTO->getMessage()->getChat()->getId(),
                    $answer
                );
            }

            if ($messageText === '/commands') {
                $msg = 'Commands: ' . PHP_EOL;

                foreach ($this->manager->getChatCommmandService()->getChatCommandCollection()->yieldHandlers() as $handler) {
                    $msg .= get_class($handler) . ' ' . PHP_EOL;

                }


                $this->telegramCoreService->sendMessage(
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
//        } catch (\Throwable $e) {
//
//            //  create new response by throwable
//            $this->getAlexaCoreManager()
//                ->getAlexaResponseService()
//                ->updateAlexaResponseByThrowable($e);
//        }
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

        dump(__METHOD__);
        die;

        $statusCode = $responseDto->getStatusCode();
        $additionalHeaders = [];
        return JsonResponse::fromJsonString($alexaResponseSerialized, $statusCode, $additionalHeaders)
            ->setSharedMaxAge(300);

    }


    public function createUpdateRequestBySymfonyRequest(): UpdateRequest
    {
        if ($this->updateRequest === null) {
            $this->updateRequest = $this->createUpdateRequestByJsonString(
                $this->getSymfonyRequest()->getContent()
            );
        }

        return $this->updateRequest;
    }

    /**
     * Deserialize json-string and return a populated 
     *
     * @param string $json
     * @return AlexaRequest
     * @throws AlexaCoreException
     */
    public function createUpdateRequestByJsonString(string $json): UpdateRequest
    {
        if ($this->updateRequest === null)
        {
            try {
                $updateRequest = $this->serializer->deserialize(
                    $json,
                    UpdateRequest::class,
                    self::REQUEST_FORMAT
                );
                /** @var UpdateRequest $updateRequest */
            }
            catch (\Throwable $e) {

                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new TelegramCoreException(
                        'Ungültiges JSON im symfony-request erhalten: ' . json_last_error_msg(),
                        0,
                        $e
                    );
                } else {
                    throw new TelegramCoreException(
                        'Error occurred while deserializing symfony-request to populate update-request.',
                        0,
                        $e
                    );
                }
            }

            //  set as current alexa-request
            $this->updateRequest = $updateRequest;
        }

        return $this->updateRequest;
    }

    /**
     * @throws LogicException
     * @return Request
     */
    private function getSymfonyRequest(): Request
    {
        $currentRequest = $this->requestStack->getCurrentRequest();

        if ($currentRequest === null) {
            throw new \LogicException('Current symfony-request is missing');
        }

        return $currentRequest;
    }




}