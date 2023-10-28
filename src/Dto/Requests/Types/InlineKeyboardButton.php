<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests\Types;

class InlineKeyboardButton
{
    /**
     * This object represents one button of an inline keyboard.
     * You must use exactly one of the optional fields.
     *
     * @link    https://core.telegram.org/bots/api#inlinekeyboardbutton
     */
    public function __construct(
        public readonly string $text,
        public readonly ?string $url = null,
        public readonly ?string $callback_data = null,
        public readonly ?WebAppInfo $web_app = null,
        public readonly ?LoginUrl $login_url = null,
        public readonly ?string $switch_inline_query = null,
        public readonly ?string $switch_inline_query_current_chat = null,
        public readonly ?SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat = null,
        public readonly ?CallbackGame $callback_game = null,
        public readonly bool $pay = false
    )
    {
    }
}