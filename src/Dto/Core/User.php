<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Core;

use OpenApi\Annotations as OA;


/**
 * Class User
 *
 * This object represents a Telegram user or bot.
 *
 * @link https://core.telegram.org/bots/api#user
 */
class User
{

    /**
     * Unique identifier for this user or bot. This number may have more than 32 significant
     * bits and some programming languages may have difficulty/silent defects in interpreting it.
     * But it has at most 52 significant bits, so a 64-bit integer or double-precision
     * float type are safe for storing this identifier.
     *
     * @var int $id
     */
    public int $id;

    /**
     * True, if this user is a bot
     *
     * @var bool $is_bot
     */
    public bool $is_bot;

    /**
     * User's or bot's first name
     *
     * @var string $first_name
     */
    public string $first_name;

    /**
     * Optional. User's or bot's last name
     *
     * @var string|null $last_name
     */
    public ?string $last_name = null;

    /**
     * Optional. User's or bot's username
     *
     * @var string|null $username
     */
    public ?string $username = null;

    /**
     * Optional. IETF language tag of the user's language
     *
     * @var string|null $language_code
     * @link https://en.wikipedia.org/wiki/IETF_language_tag
     */
    public ?string $language_code = null;

    /**
     * True, if this user is a Telegram Premium user
     *
     * @var true|null $is_premium
     * @OA\Property(type="boolean")
     */
    public ?true $is_premium;

    /**
     * True, if this user added the bot to the attachment menu
     *
     * @var true|null $added_to_attachment_menu
     * @OA\Property(type="boolean")
     */
    public ?true $added_to_attachment_menu;

    /**
     * True, if the bot can be invited to groups. Returned only in getMe.
     *
     * @var bool|null $can_join_groups
     */
    public ?bool $can_join_groups;

    /**
     * True, if privacy mode is disabled for the bot. Returned only in getMe.
     *
     * @var bool|null $can_read_all_group_messages
     */
    public ?bool $can_read_all_group_messages;

    /**
     * True, if the bot supports inline queries. Returned only in getMe.
     *
     * @var bool|null $supports_inline_queries
     */
    public ?bool $supports_inline_queries;

}