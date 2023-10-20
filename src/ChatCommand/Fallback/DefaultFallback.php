<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand\Fallback;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\AbstractFallbackChatCommand;

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
    public function createResponse(): true {

        $text = 'Fallback ChatCommand';

        dump($text);

        return true;
    }

}