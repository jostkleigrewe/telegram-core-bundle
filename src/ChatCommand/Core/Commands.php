<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand\Core;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\AbstractChatCommand;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\UpdateResponse;

/**
 * Class Hilfe
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class Commands extends AbstractChatCommand
{
    /**
     * {@inheritDoc}
     */
    protected function createResponse(UpdateRequest $updateRequest): UpdateResponse
    {
        $this->getManager()->getTelegramClientService()->sendMessage(
            $updateRequest->getMessage()->getChat()->getId(),
            $this->getMessage()
        );

        return new UpdateResponse(200, 'List of commands created');
    }

    protected function getMessage(): string
    {
        $message = 'Commands:' . PHP_EOL;

        foreach ($this->getManager()
            ->getChatCommmandService()
            ->getChatCommandCollection()
            ->yieldHandlers() as $handler) {
            $message .= get_class($handler) . ' ' . PHP_EOL;
        }

        return $message;
    }

    public function isValid(UpdateRequest $updateRequest): bool
    {
        return $updateRequest->getMessage()->getText() === '/commands';
    }


}