<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand\Core;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\AbstractChatCommand;
use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Response\UpdateResponse;

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
     * @see AbstractIntent::createResponse()
     */
    public function createResponse(UpdateRequest $updateRequest): UpdateResponse
    {
        $text = 'Ping';

        $this->getManager()->getTelegramClientService()->sendMessage(
            $updateRequest->getMessage()->getChat()->getId(),
            'Pong'
        );

        return new UpdateResponse(200, 'Pong');
    }

    public function isValid(UpdateRequest $updateRequest): bool
    {
        return $updateRequest->getMessage()->getText() === '/ping';
    }


}