<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand\Fallback;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\AbstractFallbackChatCommand;
use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Response\UpdateResponse;

/**
 * Class DefaultFallback
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class DefaultFallback extends AbstractFallbackChatCommand
{

    /**
     * {@inheritDoc}
     * @see AbstractIntent::createResponse()
     */
    public function createResponse(UpdateRequest $updateRequest): UpdateResponse {

        $text = 'Fallback ChatCommand';

        dump($text);
        throw new TelegramCoreException(
            'Anfrage konnte nicht verarbeitet werden, kein passender ChatCommand zur weiteren Verabeitung gefunden.'
        );
        return new UpdateResponse();
    }

    public function isValid(UpdateRequest $updateRequest): bool
    {
        return false;
    }


}