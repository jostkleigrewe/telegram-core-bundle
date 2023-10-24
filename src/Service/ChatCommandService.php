<?php

namespace Jostkleigrewe\TelegramCoreBundle\Service;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\ChatCommandCollection;
use Jostkleigrewe\TelegramCoreBundle\ChatCommand\ChatCommandInterface;
use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Response\UpdateResponse;
use Jostkleigrewe\TelegramCoreBundle\Exception\TelegramCoreException;

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

    public function __construct(
        private readonly ChatCommandCollection $chatCommandCollection,
    ) {}

    /**
     * @param UpdateRequest $updateRequest
     * @return ChatCommandInterface|null
     */
    public function findChatCommandByUpdateRequest(UpdateRequest $updateRequest): ?ChatCommandInterface
    {

        // find chat-command that is valid and not marked as fallback
        foreach ($this->getChatCommandCollection()->yieldHandlers() AS $chatCommand) {
            /** @var ChatCommandInterface $chatCommand */
            if ($chatCommand->isValid($updateRequest) &&
                !$chatCommand->isFallback()) {
                return $chatCommand;
            }
        }

        // find chat-command that is valid and marked as fallback
        foreach ($this->getChatCommandCollection()->yieldHandlers() AS $chatCommand) {
            /** @var ChatCommandInterface $chatCommand */
            if ($chatCommand->isValid($updateRequest) &&
                $chatCommand->isFallback()) {
                return $chatCommand;
            }
        }

        return null;
    }

    /**
     * @param UpdateRequest $updateRequest
     * @return ChatCommandInterface|null
     */
    public function findChatCommandByClassName(string $name): ?ChatCommandInterface
    {
        foreach ($this->getChatCommandCollection()->yieldHandlers() AS $chatCommand) {
            /** @var ChatCommandInterface $chatCommand */
            if ($chatCommand::class === $name) {
                return $chatCommand;
            }
        }

        return null;
    }

    /**
     * @param ChatCommandInterface $chatCommand
     * @param UpdateRequest $updateRequest
     * @return UpdateResponse
     */
    public function createResponse(
        ChatCommandInterface $chatCommand,
        UpdateRequest $updateRequest
    ): UpdateResponse
    {
        return $chatCommand->createResponse($updateRequest);
    }

    /**
     * @return ChatCommandCollection
     */
    public function getChatCommandCollection(): ChatCommandCollection
    {
        return $this->chatCommandCollection;
    }
}