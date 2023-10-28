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

    public const TYPE_BOLD = 'bold';
    public const TYPE_BOT_COMMAND = 'bot_command';
    public const TYPE_CASHTAG = 'cashtag';
    public const TYPE_CODE = 'code';
    public const TYPE_EMAIL = 'email';
    public const TYPE_HASHTAG = 'hashtag';
    public const TYPE_ITALIC = 'italic';
    public const TYPE_MENTION = 'mention';
    public const TYPE_PHONE_NUMBER = 'phone_number';
    public const TYPE_PRE = 'pre';
    public const TYPE_TEXT_LINK = 'text_link';
    public const TYPE_TEXT_MENTION = 'text_mention';
    public const TYPE_UNDERLINE = 'underline';
    public const TYPE_URL = 'url';
    public const TYPE_CUSTOM_EMOJI = 'custom_emoji';

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