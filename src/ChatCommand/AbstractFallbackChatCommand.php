<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand;

/**
 * Class AbstractFallbackChatCommand
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
abstract class AbstractFallbackChatCommand  extends AbstractChatCommand
{
    public const IS_FALLBACK = true;
}