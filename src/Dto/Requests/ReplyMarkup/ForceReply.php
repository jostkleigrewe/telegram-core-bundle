<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests\ReplyMarkup;

class ForceReply implements ReplyMarkupInterface
{

    /**
     * Upon receiving a message with this object, Telegram clients will display a reply
     * interface to the user (act as if the user has selected the bot's message and
     * tapped 'Reply'). This can be extremely useful if you want to create user-friendly
     * step-by-step interfaces without having to sacrifice privacy mode.
     *
     * @link    https://core.telegram.org/bots/api#forcereply
     */
    public function __construct(
        public readonly bool $forceReply = true,
        public readonly ?string $input_field_placeholder = null,
        public readonly ?bool $selective = null,
    )
    {
    }
}