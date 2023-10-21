<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Core;

use OpenApi\Annotations as OA;

/**
 * DTO Chat
 *
 * This object represents a chat.
 *
 * @link https://core.telegram.org/bots/api#chat
 */
class Chat
{

    /**
     * Unique identifier for this chat. This number may have more than 32 significant
     * bits and some programming languages may have difficulty/silent defects in
     * interpreting it. But it has at most 52 significant bits, so a signed 64-bit
     * integer or double-precision float type are safe for storing this identifier.
     *
     * @var int $id
     */
    public int $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     *
     * @var string $type
     */
    public string $type;

    /**
     * Optional. Title, for supergroups, channels and group chats
     *
     * @var string|null $title
     */
    public ?string $title = null;

    /**
     * Optional. Username, for private chats, supergroups and channels if available
     *
     * @var string|null $username
     */
    public ?string $username = null;

    /**
     * Optional. First name of the other party in a private chat
     *
     * @var string|null $first_name
     */
    public ?string $first_name = null;

    /**
     * Optional. Last name of the other party in a private chat
     *
     * @var string|null $last_name
     */
    public ?string $last_name = null;

    /**
     * True, if the supergroup chat is a forum (has topics enabled)
     *
     * @var true|null $is_forum
     * @OA\Property(type="boolean")
     */
    public ?true $is_forum = null;

    /**
     * Optional. Chat photo. Returned only in getChat.
     *
     * @var ChatPhoto|null $photo
     */
    public ?ChatPhoto $photo = null;

    /**
     * If non-empty, the list of all active chat usernames; for private chats,
     * supergroups and channels.
     * Returned only in getChat.
     *
     * @var string[]|null $active_usernames
     */
    public ?array $active_usernames = null;

    /**
     * Custom emoji identifier of emoji status of the other party in a private chat.
     * Returned only in getChat.
     *
     * @var string|null $emoji_status_custom_emoji_id
     */
    public ?string $emoji_status_custom_emoji_id = null;

    /**
     * Expiration date of the emoji status of the other party in a private chat in Unix time, if any.
     * Returned only in getChat.
     *
     * @var int|null $emoji_status_expiration_date
     */
    public ?int $emoji_status_expiration_date = null;

    /**
     * Bio of the other party in a private chat.
     * Returned only in getChat.
     *
     * @var string|null $bio
     */
    public ?string $bio = null;

    /**
     * True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user. Returned only in getChat.
     *
     * @var true|null $has_private_forwards
     * @OA\Property(type="boolean")
     */
    public ?true $has_private_forwards = null;

    /**
     * True, if the privacy settings of the other party restrict sending voice
     * and video note messages in the private chat. Returned only in getChat.
     *
     * @var true|null $has_restricted_voice_and_video_messages
     * @OA\Property(type="boolean")
     */
    public ?true $has_restricted_voice_and_video_messages = null;

    /**
     * True, if users need to join the supergroup before they can send messages.
     * Returned only in getChat.
     *
     * @var true|null $join_to_send_messages
     * @OA\Property(type="boolean")
     */
    public ?true $join_to_send_messages = null;

    /**
     * True, if all users directly joining the supergroup need to be approved by
     * supergroup administrators. Returned only in getChat.
     *
     * @var true|null $join_by_request
     * @OA\Property(type="boolean")
     */
    public ?true $join_by_request = null;

    /**
     * The most recent pinned message (by sending date). Returned only in getChat.
     *
     * @var Message|null
     */
    public ?Message $pinned_message;

    /**
     * Default chat member permissions, for groups and supergroups.
     * Returned only in getChat.
     *
     * @var ChatPermissions|null $permissions
     */
    public ?ChatPermissions $permissions = null;

    /**
     * Optional. For supergroups, the minimum allowed delay between consecutive
     * messages sent by each unpriviledged user. Returned only in getChat.
     *
     * @var int|null $slow_mode_delay
     */
    public ?int $slow_mode_delay = null;

    /**
     * The time after which all messages sent to the chat will be automatically deleted; in seconds.
     * Returned only in getChat.
     *
     * @var int|null $message_auto_delete_time
     */
    public ?int $message_auto_delete_time = null;

    /**
     * True, if aggressive anti-spam checks are enabled in the supergroup.
     * The field is only available to chat administrators.
     * Returned only in getChat.
     *
     * @var true|null $has_aggressive_anti_spam_enabled
     * @OA\Property(type="boolean")
     */
    public ?true $has_aggressive_anti_spam_enabled = null;

    /**
     * True, if non-administrators can only get the list of bots and administrators
     * in the chat.
     * Returned only in getChat.
     *
     * @var true|null $has_hidden_members
     * @OA\Property(type="boolean")
     */
    public ?true $has_hidden_members = null;

    /**
     * True, if messages from the chat can't be forwarded to other chats.
     * Returned only in getChat.
     *
     * @var true|null $has_protected_content
     * @OA\Property(type="boolean")
     */
    public ?true $has_protected_content = null;

    /**
     * Optional. For supergroups, name of group sticker set.
     * Returned only in getChat.
     *
     * @var string|null $sticker_set_name
     */
    public ?string $sticker_set_name = null;

    /**
     * Optional. True, if the bot can change the group sticker set.
     * Returned only in getChat.
     *
     * @var true|null $can_set_sticker_set
     * @OA\Property(type="boolean")
     */
    public ?true $can_set_sticker_set = null;

    /**
     * Optional. Unique identifier for the linked chat, i.e. the discussion group
     * identifier for a channel and vice versa; for supergroups and channel chats.
     * This identifier may be greater than 32 bits and some programming languages may
     * have difficulty/silent defects in interpreting it. But it is smaller than
     * 52 bits, so a signed 64 bit integer or double-precision float type are safe
     * for storing this identifier. Returned only in getChat.
     *
     * @var int|null $linked_chat_id
     */
    public ?int $linked_chat_id = null;

    /**
     * Optional. For supergroups, the location to which the supergroup is connected.
     * Returned only in getChat.
     *
     * @var ChatLocation|null $location
     */
    public ?ChatLocation $location = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;
        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(?string $first_name): static
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(?string $last_name): static
    {
        $this->last_name = $last_name;
        return $this;
    }

    public function getIsForum(): ?bool
    {
        return $this->is_forum;
    }

    public function setIsForum(?true $is_forum): static
    {
        $this->is_forum = $is_forum;
        return $this;
    }

    public function getPhoto(): ?ChatPhoto
    {
        return $this->photo;
    }

    public function setPhoto(?ChatPhoto $photo): static
    {
        $this->photo = $photo;
        return $this;
    }

    public function getActiveUsernames(): ?array
    {
        return $this->active_usernames;
    }

    public function setActiveUsernames(?array $active_usernames): static
    {
        $this->active_usernames = $active_usernames;
        return $this;
    }

    public function getEmojiStatusCustomEmojiId(): ?string
    {
        return $this->emoji_status_custom_emoji_id;
    }

    public function setEmojiStatusCustomEmojiId(?string $emoji_status_custom_emoji_id): static
    {
        $this->emoji_status_custom_emoji_id = $emoji_status_custom_emoji_id;
        return $this;
    }

    public function getEmojiStatusExpirationDate(): ?int
    {
        return $this->emoji_status_expiration_date;
    }

    public function setEmojiStatusExpirationDate(?int $emoji_status_expiration_date): static
    {
        $this->emoji_status_expiration_date = $emoji_status_expiration_date;
        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;
        return $this;
    }

    public function getHasPrivateForwards(): ?bool
    {
        return $this->has_private_forwards;
    }

    public function setHasPrivateForwards(?true $has_private_forwards): static
    {
        $this->has_private_forwards = $has_private_forwards;
        return $this;
    }

    public function getHasRestrictedVoiceAndVideoMessages(): ?bool
    {
        return $this->has_restricted_voice_and_video_messages;
    }

    public function setHasRestrictedVoiceAndVideoMessages(?true $has_restricted_voice_and_video_messages): static
    {
        $this->has_restricted_voice_and_video_messages = $has_restricted_voice_and_video_messages;
        return $this;
    }

    public function getJoinToSendMessages(): ?bool
    {
        return $this->join_to_send_messages;
    }

    public function setJoinToSendMessages(?true $join_to_send_messages): static
    {
        $this->join_to_send_messages = $join_to_send_messages;
        return $this;
    }

    public function getJoinByRequest(): ?bool
    {
        return $this->join_by_request;
    }

    public function setJoinByRequest(?true $join_by_request): static
    {
        $this->join_by_request = $join_by_request;
        return $this;
    }

    public function getPinnedMessage(): ?Message
    {
        return $this->pinned_message;
    }

    public function setPinnedMessage(?Message $pinned_message): static
    {
        $this->pinned_message = $pinned_message;
        return $this;
    }

    public function getPermissions(): ?ChatPermissions
    {
        return $this->permissions;
    }

    public function setPermissions(?ChatPermissions $permissions): static
    {
        $this->permissions = $permissions;
        return $this;
    }

    public function getSlowModeDelay(): ?int
    {
        return $this->slow_mode_delay;
    }

    public function setSlowModeDelay(?int $slow_mode_delay): static
    {
        $this->slow_mode_delay = $slow_mode_delay;
        return $this;
    }

    public function getMessageAutoDeleteTime(): ?int
    {
        return $this->message_auto_delete_time;
    }

    public function setMessageAutoDeleteTime(?int $message_auto_delete_time): static
    {
        $this->message_auto_delete_time = $message_auto_delete_time;
        return $this;
    }

    public function getHasAggressiveAntiSpamEnabled(): ?bool
    {
        return $this->has_aggressive_anti_spam_enabled;
    }

    public function setHasAggressiveAntiSpamEnabled(?true $has_aggressive_anti_spam_enabled): static
    {
        $this->has_aggressive_anti_spam_enabled = $has_aggressive_anti_spam_enabled;
        return $this;
    }

    public function getHasHiddenMembers(): ?bool
    {
        return $this->has_hidden_members;
    }

    public function setHasHiddenMembers(?true $has_hidden_members): static
    {
        $this->has_hidden_members = $has_hidden_members;
        return $this;
    }

    public function getHasProtectedContent(): ?bool
    {
        return $this->has_protected_content;
    }

    public function setHasProtectedContent(?true $has_protected_content): static
    {
        $this->has_protected_content = $has_protected_content;
        return $this;
    }

    public function getStickerSetName(): ?string
    {
        return $this->sticker_set_name;
    }

    public function setStickerSetName(?string $sticker_set_name): static
    {
        $this->sticker_set_name = $sticker_set_name;
        return $this;
    }

    public function getCanSetStickerSet(): ?bool
    {
        return $this->can_set_sticker_set;
    }

    public function setCanSetStickerSet(?true $can_set_sticker_set): static
    {
        $this->can_set_sticker_set = $can_set_sticker_set;
        return $this;
    }

    public function getLinkedChatId(): ?int
    {
        return $this->linked_chat_id;
    }

    public function setLinkedChatId(?int $linked_chat_id): static
    {
        $this->linked_chat_id = $linked_chat_id;
        return $this;
    }

    public function getLocation(): ?ChatLocation
    {
        return $this->location;
    }

    public function setLocation(?ChatLocation $location): static
    {
        $this->location = $location;
        return $this;
    }


    
}