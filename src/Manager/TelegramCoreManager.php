<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Jostkleigrewe\TelegramCoreBundle\Service\ChatCommandService;
use Jostkleigrewe\TelegramCoreBundle\Service\TelegramClientService;
use Jostkleigrewe\TelegramCoreBundle\Service\TelegramWebhookService;

/**
 * Class TelegramCoreManager
 *
 * contains all services for telegram-core-bundle
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
readonly class TelegramCoreManager
{

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly ChatCommandService $chatCommmandService,
        private readonly TelegramClientService $telegramClientService,
        private readonly TelegramWebhookService $telegramWebhookService,
        
    ) {
    }

    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    public function getChatCommmandService(): ChatCommandService
    {
        return $this->chatCommmandService;
    }

    public function getTelegramWebhookService(): TelegramWebhookService
    {
        return $this->telegramWebhookService;
    }

    public function getTelegramClientService(): TelegramClientService
    {
        return $this->telegramClientService;
    }

    
    
    
    
    
//    /**
//     * shortcut to fetch current alexa-request
//     *
//     * @return AlexaRequest
//     * @throws AlexaCoreException
//     */
//    public function getAlexaRequest(): AlexaRequest
//    {
//        return $this->getAlexaRequestService()->getAlexaRequest();
//    }
//
//    /**
//     * shortcut to fetch current alexa-response
//     *
//     * @return AlexaResponse
//     * @throws AlexaCoreException
//     */
//    public function getAlexaResponse(): AlexaResponse
//    {
//        return $this->getAlexaResponseService()->getAlexaResponse();
//    }
//
//    /**
//     * shortcut to fetch current alexa-session
//     *
//     * @return AlexaSession
//     * @throws AlexaCoreException
//     * @throws \Doctrine\ORM\NonUniqueResultException
//     */
//    public function getAlexaSession(): AlexaSession
//    {
//        return $this->getAlexaSessionService()->getAlexaSession();
//    }
//
//    public function getAlexaUserService(): AlexaUserService
//    {
//        return $this->alexaUserService;
//    }
//
//    public function getAlexaSessionService(): AlexaSessionService
//    {
//        return $this->alexaSessionService;
//    }
//
//    public function getAlexaDeviceService(): AlexaDeviceService
//    {
//        return $this->alexaDeviceService;
//    }
//
//    public function getEntityManager(): EntityManagerInterface
//    {
//        return $this->entityManager;
//    }
//
//    public function getIntentService(): IntentService
//    {
//        return $this->intentService;
//    }
//
//    public function getAlexaRequestService(): AlexaRequestService
//    {
//        return $this->alexaRequestService;
//    }
//
//    public function getAlexaResponseService(): AlexaResponseService
//    {
//        return $this->alexaResponseService;
//    }
}