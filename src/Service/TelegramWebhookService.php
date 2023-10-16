<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Jostkleigrewe\TelegramCoreBundle\Entity\TelegramLogWebhook;
use Jostkleigrewe\TelegramCoreBundle\Form\TelegramLogWebhookType;
use Jostkleigrewe\TelegramCoreBundle\Repository\TelegramLogWebhookRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use DateTimeImmutable;

class TelegramWebhookService
{
    public function __construct(
        private readonly RequestStack $requestStack,
        private readonly EntityManagerInterface $entityManager,
    ) {}





    /**
     * @return JsonResponse
     */
    public function getResponseForUpdates(): JsonResponse
    {
        $telegramLogWebhook = new TelegramLogWebhook();

        $symfonyRequest = $this->getSymfonyRequest()->getContent();

        $telegramLogWebhook->setData((string)$symfonyRequest);
        $telegramLogWebhook->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($telegramLogWebhook);
        $this->entityManager->flush();

        return new JsonResponse([]);
    }


    /**
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