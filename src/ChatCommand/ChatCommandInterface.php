<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand;

use Jostkleigrewe\TelegramCoreBundle\Exception\TelegramCoreException;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\Update;

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
     * @return void
     * @throws TelegramCoreException
     *
     * @see    AbstractChatCommand::execute()
     */
    public function execute(): void;

    /**
     * Check, if intent-class is valid for alexa-request
     *
     * @param  Update $request
     * @return bool
     * @see    AbstractChatCommand::isValidForRequest()
     */
    public function isValidForRequest(Update $request): bool;

    /**
     * Check, if command-class is valid by request-name
     *
     * @param  string $name
     * @return bool
     * @see    AbstractChatCommand::isValidByName()
     */
    public function isValidByName(string $name): bool;

    /**
     * Check, if command-class is fallback-command
     *
     * @return bool
     * @see    AbstractChatCommand::isFallback()
     */
    public function isFallback(): bool;
}