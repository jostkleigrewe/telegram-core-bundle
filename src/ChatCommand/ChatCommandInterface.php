<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand;

use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\UpdateResponse;
use Jostkleigrewe\TelegramCoreBundle\Exception\ChatCommandLogicException;

/**
 * Interface ChatCommandInterface
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
interface ChatCommandInterface
{

    /**
     * Execute the logic of the chat-command and return an update-response
     *
     * @param  UpdateRequest $updateRequest
     * @return UpdateResponse
     * @throws ChatCommandLogicException
     * @see    AbstractChatCommand::process()
     */
    public function process(UpdateRequest $updateRequest): UpdateResponse;

    /**
     * Check, if intent-class is valid for update-request
     *
     * @param  UpdateRequest $updateRequest
     * @return bool
     * @see    AbstractChatCommand::isValid()
     */
    public function isValid(UpdateRequest $updateRequest): bool;

    /**
     * Check, if command-class is fallback-command
     *
     * @return bool
     * @see    AbstractChatCommand::isFallback()
     */
    public function isFallback(): bool;
}