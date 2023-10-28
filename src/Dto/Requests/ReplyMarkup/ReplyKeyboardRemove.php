<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests\ReplyMarkup;

class ReplyKeyboardRemove implements ReplyMarkupInterface
{

    /**
     * Upon receiving a message with this object, Telegram clients will remove the
     * current custom keyboard and display the default letter-keyboard. By default,
     * custom keyboards are displayed until a new keyboard is sent by a bot.
     * An exception is made for one-time keyboards that are hidden immediately
     * after the user presses a button (see ReplyKeyboardMarkup).
     *
     * @link    https://core.telegram.org/bots/api#replykeyboardremove
     */
    public function __construct(
        public bool $remove_keyboard = true,
        public ?bool $selective = null
    )
    {
    }
}