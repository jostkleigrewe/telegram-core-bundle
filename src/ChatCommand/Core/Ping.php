<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand\Core;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\AbstractChatCommand;

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
    public function createResponse(): true {

        $text = 'Ping';

        $this->getManager();

        return true;
    }

}