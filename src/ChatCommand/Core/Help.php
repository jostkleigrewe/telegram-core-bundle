<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand\Core;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\AbstractChatCommand;
use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Response\UpdateResponse;

/**
 * Class Hilfe
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class Help extends AbstractChatCommand
{
    /**
     * {@inheritDoc}
     */
    protected function createResponse(UpdateRequest $updateRequest): UpdateResponse
    {
        $text = 'Hilfetext';

        $this->getManager()->getTelegramClientService()->sendMessage(
            $updateRequest->getMessage()->getChat()->getId(),
            $text
        );

        return new UpdateResponse(200, 'Help message created');
    }

    public function isValid(UpdateRequest $updateRequest): bool
    {
        return
            $updateRequest->getMessage()->getText() === '/help' ||
            $updateRequest->getMessage()->getText() === '/hilfe';
    }


}