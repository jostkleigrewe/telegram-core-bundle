<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\ChatCommandCollection;

/**
 * Class ChatCommandService
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class ChatCommandService
{

    const SERVICE_TAG = 'telegram_core.chat_command';
//
//    /**
//     * @var null|IntentInterface $intent
//     */
//    private ?IntentInterface $intent = null;
//
//    /**
//     * IntentService constructor.
//     *
//     * @param IntentCollection $intentCollection
//     * @param AlexaRequestService $alexaRequestService
//     */
    public function __construct(
        private readonly ChatCommandCollection $chatCommandCollection,
//        private readonly AlexaRequestService $alexaRequestService
    )
    {
    }

    public function getChatCommandCollection(): ChatCommandCollection
    {
        return $this->chatCommandCollection;
    }
//
//    /**
//     * get intent by current symfony-request
//     *
//     * @return IntentInterface
//     * @throws AlexaCoreException
//     */
//    public function getIntent(): IntentInterface
//    {
//        if ($this->intent === null) {
//            $this->intent = $this->getIntentByAlexaRequest(
//                $this->getAlexaRequestService()->getAlexaRequest()
//            );
//        }
//
//        return $this->intent;
//    }
//
//    /**
//     * get intent by alexa-request
//     *
//     * @param AlexaRequest $alexaRequest
//     * @return IntentInterface
//     * @throws AlexaCoreException
//     */
//    public function getIntentByAlexaRequest(AlexaRequest $alexaRequest): IntentInterface
//    {
//        $requestType = $alexaRequest->getRequest()->getType();
//
//        switch ($requestType) {
//
//            // intent
//            case AlexaRequestRequest::TYPE_INTENT:
//                $intent = $this->findIntentByAlexaRequest($alexaRequest);
//                break;
//
//            //  other official request types
//            case AlexaRequestRequest::TYPE_LAUNCH:
//            case AlexaRequestRequest::TYPE_SESSION_ENDED:
//            case AlexaRequestRequest::TYPE_CAN_FULFILL_INTENT:
//                $intent = $this->findIntentByName($requestType);
//                break;
//
//            default:
//                $intent = NULL;
//                break;
//        }
//
//        if ($intent !== NULL) {
//            return $intent;
//        }
//
//        $msg = 'Anfrage konnte nicht verarbeitet werden, keine passende Intention zur weiteren Verabeitung gefunden.';
//        $msg .= ' Request-Type: ' . $requestType;
//        if ($alexaRequest->getRequest()->getIntent()) {
//            $msg .= ', Intent: ' . $alexaRequest->getRequest()->getIntent()->getName();
//        }
//        throw new AlexaCoreException($msg);
//    }
//
//    /**
//     * Find intent by alexa-request
//     *
//     * @param AlexaRequest $alexaRequest
//     * @return IntentInterface|null
//     */
//    protected function findIntentByAlexaRequest(AlexaRequest $alexaRequest): ?IntentInterface
//    {
//
//        // find intents that are valid and not marked as fallback
//        foreach ($this->getIntentCollection()->yieldHandlers() AS $intent) {
//            /** @var IntentInterface $intent */
//            if ($intent->isValidForRequest($alexaRequest) && !$intent->isFallback()) {
//                return $intent;
//            }
//        }
//
//        // find intents that are valid and marked as fallback
//        foreach ($this->getIntentCollection()->yieldHandlers() AS $intent) {
//            /** @var IntentInterface $intent */
//            if ($intent->isValidForRequest($alexaRequest) && $intent->isFallback()) {
//                return $intent;
//            }
//        }
//
//        return null;
//    }
//
//    /**
//     * Find intent by name
//     *
//     * @param string $intentName
//     * @return IntentInterface|null
//     */
//    protected function findIntentByName(string $intentName): ?IntentInterface
//    {
//
//        // find intents that are valid and not marked as fallback
//        foreach ($this->getIntentCollection()->yieldHandlers() AS $intent) {
//            /** @var IntentInterface $intent */
//            if ($intent->isValidByName($intentName) && !$intent->isFallback()) {
//                return $intent;
//            }
//        }
//
//        // find intents that are valid and marked as fallback
//        foreach ($this->getIntentCollection()->yieldHandlers() AS $intent) {
//            /** @var IntentInterface $intent */
//            if ($intent->isValidByName($intentName) && $intent->isFallback()) {
//                return $intent;
//            }
//        }
//
//        return null;
//    }
//
//    /**
//     * @param IntentInterface|null $intent
//     * @return void
//     * @throws AlexaCoreException
//     */
//    public function executeIntent(?IntentInterface $intent = null): void
//    {
//        $intent = $intent ?? $this->getIntent();
//        $intent->execute();
//    }
//
//    /**
//     * @return IntentCollection
//     */
//    public function getIntentCollection(): IntentCollection
//    {
//        return $this->intentCollection;
//    }
//
//    /**
//     * @return AlexaRequestService
//     */
//    protected function getAlexaRequestService(): AlexaRequestService
//    {
//        return $this->alexaRequestService;
//    }


}