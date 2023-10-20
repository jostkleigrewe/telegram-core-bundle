<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message;

use Jostkleigrewe\TelegramCoreBundle\Dto\Core\User;

/**
 * Class MessageEntity
 *
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 *
 * @link https://core.telegram.org/bots/api#messageentity
 */
class MessageEntity
{

    /**
     * Type of the entity. Can be mention (@username), hashtag, cashtag, bot_command, url, email,
     * phone_number, bold (bold text), italic (italic text), code (monowidth string), pre (monowidth
     * block), text_link (for clickable text URLs), text_mention (for users without usernames)
     *
     * @var string $type
     */
    public string $type;

    /**
     * Offset in UTF-16 code units to the start of the entity
     *
     * @var int $offset
     */
    public int $offset;

    /**
     * Length of the entity in UTF-16 code units
     *
     * @var int $length
     */
    public int $length;

    /**
     * Optional. For “text_link” only, url that will be opened after user taps on the text
     *
     * @var string|null $url
     */
    public ?string $url = null;

    /**
     * Optional. For “text_mention” only, the mentioned user
     *
     * @var User|null $user
     */
    public ?User $user = null;

    /**
     * Optional. For “pre” only, the programming language of the entity text
     *
     * @var string|null $language
     */
    public ?string $language = null;

    /**
     * Optional. For “custom_emoji” only, unique identifier of the custom emoji.
     * Use getCustomEmojiStickers to get full information about the sticker
     *
     * @var string|null $custom_emoji_id
     */
    public ?string $custom_emoji_id = null;
}