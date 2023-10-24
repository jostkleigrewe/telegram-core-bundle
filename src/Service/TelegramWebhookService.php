<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;


use Jostkleigrewe\TelegramCoreBundle\ChatCommand\Fallback\DefaultFallback;
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

    /**
     * @return JsonResponse
     * @throws TelegramCoreException
     */
    public function getResponse(): JsonResponse
    {
        return $this->getResponseByUpdateRequest(
            $this->createUpdateRequestBySymfonyRequest()
        );
    }

    /**
     * @param UpdateRequest $updateRequestDTO
     * @return JsonResponse
     * @throws TelegramCoreException
     */
    public function getResponseByUpdateRequest(UpdateRequest $updateRequestDTO): JsonResponse
    {
        try {

            // get chat-command by update-request
            $chatCommand = $this->chatCommandService
                ->findChatCommandByUpdateRequest($updateRequestDTO);

            // get fallback chat-command
            if ($chatCommand === null) {
                $chatCommand = $this->chatCommandService
                    ->findChatCommandByClassName(DefaultFallback::class);
            }

            // chat-command missing
            if ($chatCommand === null) {
                throw new TelegramCoreException(
                    'No chat-command found for update-request.'
                );
            }

            // create response by chat-command
            $updateResponseDTO = $chatCommand->createResponse($updateRequestDTO);

            } catch (\Throwable $e) {
                $updateResponseDTO = new UpdateResponse(
                    500,
                    $e->getMessage(),
                );
            }


        //  create and return json-response


        $updateResponseDTO->setUpdateRequest($updateRequestDTO);


        $alexaResponseSerialized = $this->serializer->serialize(
            $updateResponseDTO, 'json',
            [
                AbstractObjectNormalizer::SKIP_NULL_VALUES => true
            ]
        );


        $statusCode = $updateResponseDTO->getStatusCode();
        $additionalHeaders = [];
        return JsonResponse::fromJsonString(
            $alexaResponseSerialized,
            $statusCode,
            $additionalHeaders)->setSharedMaxAge(300);

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