<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand\Fallback;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\AbstractFallbackChatCommand;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\UpdateResponse;

/**
 * Class DefaultFallback
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class DefaultFallback extends AbstractFallbackChatCommand
{

    protected function createResponse(UpdateRequest $updateRequest): UpdateResponse
    {
        return new UpdateResponse(200, 'Fallback');
    }

    public function isValid(UpdateRequest $updateRequest): bool
    {
        return true;
    }
}