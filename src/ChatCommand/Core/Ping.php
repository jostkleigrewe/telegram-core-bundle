<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand\Core;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\AbstractChatCommand;
use Jostkleigrewe\TelegramCoreBundle\Dto\Requests\SendMessage;
use Jostkleigrewe\TelegramCoreBundle\Dto\Requests\SendPhoto;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\UpdateResponse;

/**
 * Class Ping
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class Ping extends AbstractChatCommand
{

    /**
     * {@inheritDoc}
     */
    protected function createResponse(UpdateRequest $updateRequest): UpdateResponse
    {
        $text = 'Ping';

        //  create telegram-request
        $telegramRequest = new SendMessage(
            $updateRequest->getMessage()->getChat()->getId(),
            'Pong'
        );

        //  send request to telegram
        $response = $this->getManager()->getTelegramClientService()->sendRequest(
            $telegramRequest
        );

        return new UpdateResponse(200, 'Pong');
    }

    public function isValid(UpdateRequest $updateRequest): bool
    {
        return $updateRequest?->getMessage()?->getText() === '/ping';
    }
}