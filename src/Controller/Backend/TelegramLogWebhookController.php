<?php

namespace Jostkleigrewe\TelegramCoreBundle\Controller\Backend;

use Jostkleigrewe\TelegramCoreBundle\Entity\TelegramLogWebhook;
use Jostkleigrewe\TelegramCoreBundle\Form\TelegramLogWebhookType;
use Jostkleigrewe\TelegramCoreBundle\Repository\TelegramLogWebhookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/backend/telegram/log/webhook')]
class TelegramLogWebhookController extends AbstractController
{
    #[Route('/', name: 'app_telegram_log_webhook_index', methods: ['GET'])]
    public function index(TelegramLogWebhookRepository $telegramLogWebhookRepository): Response
    {
        return $this->render('backend/telegram_log_webhook/index.html.twig', [
            'telegram_log_webhooks' => $telegramLogWebhookRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_telegram_log_webhook_backend_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $telegramLogWebhook = new TelegramLogWebhook();
        $form = $this->createForm(TelegramLogWebhookType::class, $telegramLogWebhook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($telegramLogWebhook);
            $entityManager->flush();

            return $this->redirectToRoute('app_telegram_log_webhook_backend_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('telegram_log_webhook_backend/new.html.twig', [
            'telegram_log_webhook' => $telegramLogWebhook,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_telegram_log_webhook_backend_show', methods: ['GET'])]
    public function show(TelegramLogWebhook $telegramLogWebhook): Response
    {
        return $this->render('backend/telegram_log_webhook/show.html.twig', [
            'telegram_log_webhook' => $telegramLogWebhook,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_telegram_log_webhook_backend_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TelegramLogWebhook $telegramLogWebhook, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TelegramLogWebhookType::class, $telegramLogWebhook);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_telegram_log_webhook_backend_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('backend/telegram_log_webhook/edit.html.twig', [
            'telegram_log_webhook' => $telegramLogWebhook,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_telegram_log_webhook_backend_delete', methods: ['POST'])]
    public function delete(Request $request, TelegramLogWebhook $telegramLogWebhook, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$telegramLogWebhook->getId(), $request->request->get('_token'))) {
            $entityManager->remove($telegramLogWebhook);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_telegram_log_webhook_backend_index', [], Response::HTTP_SEE_OTHER);
    }
}
