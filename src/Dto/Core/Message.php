<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Core;

use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Animation;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Audio;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Contact;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Dice;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Document;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Game;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Invoice;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Location;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\MessageEntity;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\PhotoSize;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Sticker;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Story;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\SuccessfulPayment;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Venue;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Video;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\VideoNote;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Poll;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Voice;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\ChatShared;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\ForumTopicClosed;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\ForumTopicCreated;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\ForumTopicEdited;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\ForumTopicReopened;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\GeneralForumTopicHidden;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\GeneralForumTopicUnhidden;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\ProximityAlertTriggered;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\UserShared;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\VideoChatEnded;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\VideoChatParticipantsInvited;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\VideoChatScheduled;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\VideoChatStarted;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\WebAppData;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ServiceMessage\WriteAccessAllowed;
use OpenApi\Annotations as OA;


class Message
{

    /**
     * Unique message identifier inside this chat
     *
     * @var int $message_id
     */
    public int $message_id;

    /**
     * Unique identifier of a message thread to which the message belongs; for supergroups only
     *
     * @var int|null $message_thread_id
     */
    public ?int $message_thread_id = null;

    /**
     * Sender, empty for messages sent to channels
     *
     * @var User|null $from
     */
    public ?User $from = null;

    /**
     * Sender of the message, sent on behalf of a chat. The channel itself for channel
     * messages. The supergroup itself for messages from anonymous group administrators.
     * The linked channel for messages automatically forwarded to the discussion group
     *
     * @var Chat|null $sender_chat
     */
    public ?Chat $sender_chat = null;

    /**
     * Date the message was sent in Unix time
     *
     * @var int $date
     */
    public int $date;

    /**
     * Conversation the message belongs to
     *
     * @var Chat $chat
     */
    public Chat $chat;

    /**
     * For forwarded messages, sender of the original message
     *
     * @var User|null $forward_from
     */
    public ?User $forward_from = null;

    /**
     * For messages forwarded from channels or from anonymous administrators, information
     * about the original sender chat
     *
     * @var Chat|null $forward_from_chat
     */
    public ?Chat $forward_from_chat = null;

    /**
     * For messages forwarded from channels, identifier of the original message in the channel
     *
     * @var int|null $forward_from_message_id
     */
    public ?int $forward_from_message_id = null;

    /**
     * For messages forwarded from channels, signature of the post author if present
     *
     * @var string|null $forward_signature
     */
    public ?string $forward_signature = null;

    /**
     * Sender's name for messages forwarded from users who disallow adding a link to
     * their account in forwarded messages
     *
     * @var string|null $forward_sender_name
     */
    public ?string $forward_sender_name = null;

    /**
     * For forwarded messages, date the original message was sent in Unix time
     *
     * @var int|null $forward_date
     */
    public ?int $forward_date = null;

    /**
     * True, if the message is sent to a forum topic
     *
     * @var true|null $is_topic_message
     * @OA\Property(type="boolean")
     */
    public ?true $is_topic_message = null;

    /**
     * True, if the message is a channel post that was automatically
     * forwarded to the connected discussion group
     *
     * @var true|null $is_automatic_forward
     * @OA\Property(type="boolean")
     */
    public ?true $is_automatic_forward = null;

    /**
     * For replies, the original message. Note that the Message object in this field
     * will not contain further reply_to_message fields even if it itself is a reply
     *
     * @var Message|null $reply_to_message
     */
    public ?Message $reply_to_message = null;

     /**
      * Bot through which the message was sent
      *
      * @var User|null $via_bot
      */
    public ?User $via_bot = null;

    /**
     * Date the message was last edited in Unix time
     *
     * @var int|null $edit_date
     */
    public ?int $edit_date = null;

    /**
     * True, if the message can't be forwarded
     *
     * @var true|null $has_protected_content
     * @OA\Property(type="boolean")
     */
    public ?true $has_protected_content = null;

    /**
     * The unique identifier of a media message group this message belongs to
     *
     * @var string|null $media_group_id
     */
    public ?string $media_group_id = null;

    /**
     * Signature of the post author for messages in channels, or the custom title
     * of an anonymous group administrator
     *
     * @var string|null $author_signature
     */
    public ?string $author_signature = null;

    /**
     * For text messages, the actual UTF-8 text of the message, 0-4096 characters
     *
     * @var string|null $text
     */
    public ?string $text = null;

    /**
     * For text messages, special entities like usernames, URLs, bot commands, etc.
     * that appear in the text
     *
     * @var MessageEntity[]|null $entities
     */
    public ?array $entities = null;

    /**
     * Message is an animation, information about the animation.
     * For backward compatibility, when this field is set, the document field will also be set
     *
     * @var Animation|null $animation
     */
    public ?Animation $animation = null;

    /**
     * Message is an audio file, information about the file
     *
     * @var Audio|null $audio
     */
    public ?Audio $audio = null;

    /**
     * Message is a general file, information about the file
     *
     * @var Document|null $document
     */
    public ?Document $document = null;

    /**
     * Message is a photo, available sizes of the photo
     *
     * @var PhotoSize[]|null $photo
     */
    public ?array $photo = null;

    /**
     * Message is a sticker, information about the sticker
     *
     * @var Sticker|null $sticker
     */
    public ?Sticker $sticker = null;

    /**
     * Message is a forwarded story
     *
     * @var Story|null $story
     */
    public ?Story $story = null;

    /**
     * Message is a video, information about the video
     *
     * @var Video|null $video
     */
    public ?Video $video = null;

    /**
     * Message is a video note, information about the video message
     *
     * @var VideoNote|null $video_note
     */
    public ?VideoNote $video_note = null;

    /**
     * Message is a voice message, information about the file
     *
     * @var Voice|null $voice
     */
    public ?Voice $voice = null;

    /**
     * Caption for the animation, audio, document, photo, video or voice,
     * 0-1024 characters
     *
     * @var string|null $caption
     */
    public ?string $caption = null;

    /**
     * For messages with a caption, special entities like usernames, URLs,
     * bot commands, etc. that appear in the caption
     *
     * @var MessageEntity[]|null $caption_entities
     */
    public ?array $caption_entities = null;

    /**
     * True, if the message media is covered by a spoiler animation
     *
     * @var true|null $has_media_spoiler
     * @OA\Property(type="boolean")
     */
    public ?true $has_media_spoiler = null;

    /**
     * Message is a shared contact, information about the contact
     *
     * @var Contact|null $contact
     */
    public ?Contact $contact = null;

    /**
     * Message is a dice with random value from 1 to 6
     *
     * @var Dice|null $dice
     */
    public ?Dice $dice = null;

    /**
     * Message is a game, information about the game. More about games »
     *
     * @var Game|null $game
     */
    public ?Game $game = null;

    /**
     * Message is a native poll, information about the poll
     *
     * @var Poll|null $poll
     */
    public ?Poll $poll = null;

    /**
     * Message is a venue, information about the venue. For backward compatibility,
     * when this field is set, the location field will also be set
     *
     * @var Venue|null $venue
     */
    public ?Venue $venue = null;

    /**
     * Message is a shared location, information about the location
     *
     * @var Location|null $location
     */
    public ?Location $location = null;

    /**
     * New members that were added to the group or supergroup and information
     * about them (the bot itself may be one of these members)
     *
     * @var User[]|null $new_chat_members
     */
    public ?array $new_chat_members = null;

    /**
     * A member was removed from the group, information about them (this member may be the bot itself)
     *
     * @var User|null $left_chat_member
     */
    public ?User $left_chat_member = null;

    /**
     * A chat title was changed to this value
     *
     * @var string|null $new_chat_title
     */
    public ?string $new_chat_title = null;

    /**
     * A chat photo was change to this value
     *
     * @var PhotoSize[]|null $new_chat_photo
     */
    public ?array $new_chat_photo = null;

    /**
     * Service message: the chat photo was deleted
     *
     * @var true|null $delete_chat_photo
     * @OA\Property(type="boolean")
     */
    public ?true $delete_chat_photo = null;

    /**
     * Service message: the group has been created
     *
     * @var true|null $group_chat_created
     * @OA\Property(type="boolean")
     */
    public ?true $group_chat_created = null;

    /**
     * Service message: the supergroup has been created. This field can‘t be received
     * in a message coming through updates, because bot can’t be a member of a supergroup
     * when it is created. It can only be found in reply_to_message if someone replies
     * to a very first message in a directly created supergroup
     *
     * @var true|null $supergroup_chat_created
     * @OA\Property(type="boolean")
     */
    public ?true $supergroup_chat_created = null;

    /**
     * Service message: the channel has been created. This field can‘t be received in
     * a message coming through updates, because bot can’t be a member of a channel when
     * it is created. It can only be found in reply_to_message if someone replies to a
     * very first message in a channel
     *
     * @var true|null $channel_chat_created
     * @OA\Property(type="boolean")
     */
    public ?true $channel_chat_created = null;

    /**
     * The group has been migrated to a supergroup with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may
     * have difficulty/silent defects in interpreting it. But it is smaller than
     * 52 bits, so a signed 64 bit integer or double-precision float type are safe
     * for storing this identifier
     *
     * @var int|null $migrate_to_chat_id
     */
    public ?int $migrate_to_chat_id = null;

    /**
     * The supergroup has been migrated from a group with the specified identifier.
     * This number may be greater than 32 bits and some programming languages may
     * have difficulty/silent defects in interpreting it. But it is smaller than
     * 52 bits, so a signed 64 bit integer or double-precision float type are safe
     * for storing this identifier
     *
     * @var int|null $migrate_from_chat_id
     */
    public ?int $migrate_from_chat_id = null;

    /**
     * Specified message was pinned. Note that the Message object in this field will
     * not contain further reply_to_message fields even if it is itself a reply
     *
     * @var Message|null $pinned_message
     */
    public ?Message $pinned_message = null;

    /**
     * Message is an invoice for a payment, information about the invoice
     *
     * @var Invoice|null $invoice
     */
    public ?Invoice $invoice = null;

    /**
     * Message is a service message about a successful payment, information about the payment
     *
     * @var SuccessfulPayment|null $successful_payment
     */
    public ?SuccessfulPayment $successful_payment = null;

    /**
     * Service message: a user was shared with the bot
     *
     * @var UserShared|null $user_shared
     */
    public ?UserShared $user_shared = null;

    /**
     * Service message: a chat was shared with the bot
     *
     * @var ChatShared|null $chat_shared
     */
    public ?ChatShared $chat_shared = null;

    /**
     * The domain name of the website on which the user has logged in
     *
     * @var string|null $connected_website
     */
    public ?string $connected_website = null;

    /**
     * Service message: the user allowed the bot to write messages after adding
     * it to the attachment or side menu, launching a Web App from a link,
     * or accepting an explicit request from a Web App sent by
     * the method requestWriteAccess
     *
     * @var WriteAccessAllowed|null $write_access_allowed
     */
    public ?WriteAccessAllowed $write_access_allowed = null;

    /**
     * Telegram Passport data
     *
     * @var PassportData|null $passport_data
     */
    public ?PassportData $passport_data = null;

    /**
     * Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
     *
     * @var ProximityAlertTriggered|null $proximity_alert_triggered
     */
    public ?ProximityAlertTriggered $proximity_alert_triggered = null;

    /**
     * Service message: forum topic created
     *
     * @var ForumTopicCreated|null $forum_topic_created
     */
    public ?ForumTopicCreated $forum_topic_created = null;

    /**
     * Service message: forum topic edited
     *
     * @var ForumTopicEdited|null $forum_topic_edited
     */
    public ?ForumTopicEdited $forum_topic_edited = null;

    /**
     * Service message: forum topic closed
     *
     * @var ForumTopicClosed|null $forum_topic_closed
     */
    public ?ForumTopicClosed $forum_topic_closed = null;

    /**
     * Service message: forum topic reopened
     *
     * @var ForumTopicReopened|null $forum_topic_reopened
     */
    public ?ForumTopicReopened $forum_topic_reopened = null;

    /**
     * Service message: the 'General' forum topic hidden
     *
     * @var GeneralForumTopicHidden|null $general_forum_topic_hidden
     */
    public ?GeneralForumTopicHidden $general_forum_topic_hidden = null;

    /**
     * Service message: the 'General' forum topic unhidden
     *
     * @var GeneralForumTopicUnhidden|null $general_forum_topic_unhidden
     */
    public ?GeneralForumTopicUnhidden $general_forum_topic_unhidden = null;

    /**
     * Service message: video chat scheduled
     *
     * @var VideoChatScheduled|null $video_chat_scheduled
     */
    public ?VideoChatScheduled $video_chat_scheduled = null;

    /**
     * Service message: video chat started
     *
     * @var VideoChatStarted|null $video_chat_started
     */
    public ?VideoChatStarted $video_chat_started = null;

    /**
     * Service message: video chat ended
     *
     * @var VideoChatEnded|null $video_chat_ended
     */
    public ?VideoChatEnded $video_chat_ended = null;

    /**
     * Service message: new participants invited to a video chat
     *
     * @var VideoChatParticipantsInvited|null $video_chat_participants_invited
     */
    public ?VideoChatParticipantsInvited $video_chat_participants_invited = null;

    /**
     * Service message: data sent by a Web App
     *
     * @var WebAppData|null $web_app_data
     */
    public ?WebAppData $web_app_data = null;

    /**
     * Optional. Inline keyboard attached to the message.
     * login_url buttons are represented as ordinary url buttons.
     *
     * @var InlineKeyboardMarkup|null $reply_markup
     */
    public ?InlineKeyboardMarkup $reply_markup = null;

    public function getMessageId(): int
    {
        return $this->message_id;
    }

    public function setMessageId(int $message_id): Message
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getMessageThreadId(): ?int
    {
        return $this->message_thread_id;
    }

    public function setMessageThreadId(?int $message_thread_id): Message
    {
        $this->message_thread_id = $message_thread_id;
        return $this;
    }

    public function getFrom(): ?User
    {
        return $this->from;
    }

    public function setFrom(?User $from): Message
    {
        $this->from = $from;
        return $this;
    }

    public function getSenderChat(): ?Chat
    {
        return $this->sender_chat;
    }

    public function setSenderChat(?Chat $sender_chat): Message
    {
        $this->sender_chat = $sender_chat;
        return $this;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function setDate(int $date): Message
    {
        $this->date = $date;
        return $this;
    }

    public function getChat(): Chat
    {
        return $this->chat;
    }

    public function setChat(Chat $chat): Message
    {
        $this->chat = $chat;
        return $this;
    }

    public function getForwardFrom(): ?User
    {
        return $this->forward_from;
    }

    public function setForwardFrom(?User $forward_from): Message
    {
        $this->forward_from = $forward_from;
        return $this;
    }

    public function getForwardFromChat(): ?Chat
    {
        return $this->forward_from_chat;
    }

    public function setForwardFromChat(?Chat $forward_from_chat): Message
    {
        $this->forward_from_chat = $forward_from_chat;
        return $this;
    }

    public function getForwardFromMessageId(): ?int
    {
        return $this->forward_from_message_id;
    }

    public function setForwardFromMessageId(?int $forward_from_message_id): Message
    {
        $this->forward_from_message_id = $forward_from_message_id;
        return $this;
    }

    public function getForwardSignature(): ?string
    {
        return $this->forward_signature;
    }

    public function setForwardSignature(?string $forward_signature): Message
    {
        $this->forward_signature = $forward_signature;
        return $this;
    }

    public function getForwardSenderName(): ?string
    {
        return $this->forward_sender_name;
    }

    public function setForwardSenderName(?string $forward_sender_name): Message
    {
        $this->forward_sender_name = $forward_sender_name;
        return $this;
    }

    public function getForwardDate(): ?int
    {
        return $this->forward_date;
    }

    public function setForwardDate(?int $forward_date): Message
    {
        $this->forward_date = $forward_date;
        return $this;
    }

    public function getIsTopicMessage(): ?true
    {
        return $this->is_topic_message;
    }

    public function setIsTopicMessage(?true $is_topic_message): Message
    {
        $this->is_topic_message = $is_topic_message;
        return $this;
    }

    public function getIsAutomaticForward(): ?true
    {
        return $this->is_automatic_forward;
    }

    public function setIsAutomaticForward(?true $is_automatic_forward): Message
    {
        $this->is_automatic_forward = $is_automatic_forward;
        return $this;
    }

    public function getReplyToMessage(): ?Message
    {
        return $this->reply_to_message;
    }

    public function setReplyToMessage(?Message $reply_to_message): Message
    {
        $this->reply_to_message = $reply_to_message;
        return $this;
    }

    public function getViaBot(): ?User
    {
        return $this->via_bot;
    }

    public function setViaBot(?User $via_bot): Message
    {
        $this->via_bot = $via_bot;
        return $this;
    }

    public function getEditDate(): ?int
    {
        return $this->edit_date;
    }

    public function setEditDate(?int $edit_date): Message
    {
        $this->edit_date = $edit_date;
        return $this;
    }

    public function getHasProtectedContent(): ?true
    {
        return $this->has_protected_content;
    }

    public function setHasProtectedContent(?true $has_protected_content): Message
    {
        $this->has_protected_content = $has_protected_content;
        return $this;
    }

    public function getMediaGroupId(): ?string
    {
        return $this->media_group_id;
    }

    public function setMediaGroupId(?string $media_group_id): Message
    {
        $this->media_group_id = $media_group_id;
        return $this;
    }

    public function getAuthorSignature(): ?string
    {
        return $this->author_signature;
    }

    public function setAuthorSignature(?string $author_signature): Message
    {
        $this->author_signature = $author_signature;
        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): Message
    {
        $this->text = $text;
        return $this;
    }

    public function getEntities(): ?array
    {
        return $this->entities;
    }

    public function setEntities(?array $entities): Message
    {
        $this->entities = $entities;
        return $this;
    }

    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    public function setAnimation(?Animation $animation): Message
    {
        $this->animation = $animation;
        return $this;
    }

    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    public function setAudio(?Audio $audio): Message
    {
        $this->audio = $audio;
        return $this;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): Message
    {
        $this->document = $document;
        return $this;
    }

    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    public function setPhoto(?array $photo): Message
    {
        $this->photo = $photo;
        return $this;
    }

    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    public function setSticker(?Sticker $sticker): Message
    {
        $this->sticker = $sticker;
        return $this;
    }

    public function getStory(): ?Story
    {
        return $this->story;
    }

    public function setStory(?Story $story): Message
    {
        $this->story = $story;
        return $this;
    }

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function setVideo(?Video $video): Message
    {
        $this->video = $video;
        return $this;
    }

    public function getVideoNote(): ?VideoNote
    {
        return $this->video_note;
    }

    public function setVideoNote(?VideoNote $video_note): Message
    {
        $this->video_note = $video_note;
        return $this;
    }

    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    public function setVoice(?Voice $voice): Message
    {
        $this->voice = $voice;
        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): Message
    {
        $this->caption = $caption;
        return $this;
    }

    public function getCaptionEntities(): ?array
    {
        return $this->caption_entities;
    }

    public function setCaptionEntities(?array $caption_entities): Message
    {
        $this->caption_entities = $caption_entities;
        return $this;
    }

    public function getHasMediaSpoiler(): ?true
    {
        return $this->has_media_spoiler;
    }

    public function setHasMediaSpoiler(?true $has_media_spoiler): Message
    {
        $this->has_media_spoiler = $has_media_spoiler;
        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): Message
    {
        $this->contact = $contact;
        return $this;
    }

    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    public function setDice(?Dice $dice): Message
    {
        $this->dice = $dice;
        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): Message
    {
        $this->game = $game;
        return $this;
    }

    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    public function setPoll(?Poll $poll): Message
    {
        $this->poll = $poll;
        return $this;
    }

    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    public function setVenue(?Venue $venue): Message
    {
        $this->venue = $venue;
        return $this;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): Message
    {
        $this->location = $location;
        return $this;
    }

    public function getNewChatMembers(): ?array
    {
        return $this->new_chat_members;
    }

    public function setNewChatMembers(?array $new_chat_members): Message
    {
        $this->new_chat_members = $new_chat_members;
        return $this;
    }

    public function getLeftChatMember(): ?User
    {
        return $this->left_chat_member;
    }

    public function setLeftChatMember(?User $left_chat_member): Message
    {
        $this->left_chat_member = $left_chat_member;
        return $this;
    }

    public function getNewChatTitle(): ?string
    {
        return $this->new_chat_title;
    }

    public function setNewChatTitle(?string $new_chat_title): Message
    {
        $this->new_chat_title = $new_chat_title;
        return $this;
    }

    public function getNewChatPhoto(): ?array
    {
        return $this->new_chat_photo;
    }

    public function setNewChatPhoto(?array $new_chat_photo): Message
    {
        $this->new_chat_photo = $new_chat_photo;
        return $this;
    }

    public function getDeleteChatPhoto(): ?true
    {
        return $this->delete_chat_photo;
    }

    public function setDeleteChatPhoto(?true $delete_chat_photo): Message
    {
        $this->delete_chat_photo = $delete_chat_photo;
        return $this;
    }

    public function getGroupChatCreated(): ?true
    {
        return $this->group_chat_created;
    }

    public function setGroupChatCreated(?true $group_chat_created): Message
    {
        $this->group_chat_created = $group_chat_created;
        return $this;
    }

    public function getSupergroupChatCreated(): ?true
    {
        return $this->supergroup_chat_created;
    }

    public function setSupergroupChatCreated(?true $supergroup_chat_created): Message
    {
        $this->supergroup_chat_created = $supergroup_chat_created;
        return $this;
    }

    public function getChannelChatCreated(): ?true
    {
        return $this->channel_chat_created;
    }

    public function setChannelChatCreated(?true $channel_chat_created): Message
    {
        $this->channel_chat_created = $channel_chat_created;
        return $this;
    }

    public function getMigrateToChatId(): ?int
    {
        return $this->migrate_to_chat_id;
    }

    public function setMigrateToChatId(?int $migrate_to_chat_id): Message
    {
        $this->migrate_to_chat_id = $migrate_to_chat_id;
        return $this;
    }

    public function getMigrateFromChatId(): ?int
    {
        return $this->migrate_from_chat_id;
    }

    public function setMigrateFromChatId(?int $migrate_from_chat_id): Message
    {
        $this->migrate_from_chat_id = $migrate_from_chat_id;
        return $this;
    }

    public function getPinnedMessage(): ?Message
    {
        return $this->pinned_message;
    }

    public function setPinnedMessage(?Message $pinned_message): Message
    {
        $this->pinned_message = $pinned_message;
        return $this;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(?Invoice $invoice): Message
    {
        $this->invoice = $invoice;
        return $this;
    }

    public function getSuccessfulPayment(): ?SuccessfulPayment
    {
        return $this->successful_payment;
    }

    public function setSuccessfulPayment(?SuccessfulPayment $successful_payment): Message
    {
        $this->successful_payment = $successful_payment;
        return $this;
    }

    public function getUserShared(): ?UserShared
    {
        return $this->user_shared;
    }

    public function setUserShared(?UserShared $user_shared): Message
    {
        $this->user_shared = $user_shared;
        return $this;
    }

    public function getChatShared(): ?ChatShared
    {
        return $this->chat_shared;
    }

    public function setChatShared(?ChatShared $chat_shared): Message
    {
        $this->chat_shared = $chat_shared;
        return $this;
    }

    public function getConnectedWebsite(): ?string
    {
        return $this->connected_website;
    }

    public function setConnectedWebsite(?string $connected_website): Message
    {
        $this->connected_website = $connected_website;
        return $this;
    }

    public function getWriteAccessAllowed(): ?WriteAccessAllowed
    {
        return $this->write_access_allowed;
    }

    public function setWriteAccessAllowed(?WriteAccessAllowed $write_access_allowed): Message
    {
        $this->write_access_allowed = $write_access_allowed;
        return $this;
    }

    public function getPassportData(): ?PassportData
    {
        return $this->passport_data;
    }

    public function setPassportData(?PassportData $passport_data): Message
    {
        $this->passport_data = $passport_data;
        return $this;
    }

    public function getProximityAlertTriggered(): ?ProximityAlertTriggered
    {
        return $this->proximity_alert_triggered;
    }

    public function setProximityAlertTriggered(?ProximityAlertTriggered $proximity_alert_triggered): Message
    {
        $this->proximity_alert_triggered = $proximity_alert_triggered;
        return $this;
    }

    public function getForumTopicCreated(): ?ForumTopicCreated
    {
        return $this->forum_topic_created;
    }

    public function setForumTopicCreated(?ForumTopicCreated $forum_topic_created): Message
    {
        $this->forum_topic_created = $forum_topic_created;
        return $this;
    }

    public function getForumTopicEdited(): ?ForumTopicEdited
    {
        return $this->forum_topic_edited;
    }

    public function setForumTopicEdited(?ForumTopicEdited $forum_topic_edited): Message
    {
        $this->forum_topic_edited = $forum_topic_edited;
        return $this;
    }

    public function getForumTopicClosed(): ?ForumTopicClosed
    {
        return $this->forum_topic_closed;
    }

    public function setForumTopicClosed(?ForumTopicClosed $forum_topic_closed): Message
    {
        $this->forum_topic_closed = $forum_topic_closed;
        return $this;
    }

    public function getForumTopicReopened(): ?ForumTopicReopened
    {
        return $this->forum_topic_reopened;
    }

    public function setForumTopicReopened(?ForumTopicReopened $forum_topic_reopened): Message
    {
        $this->forum_topic_reopened = $forum_topic_reopened;
        return $this;
    }

    public function getGeneralForumTopicHidden(): ?GeneralForumTopicHidden
    {
        return $this->general_forum_topic_hidden;
    }

    public function setGeneralForumTopicHidden(?GeneralForumTopicHidden $general_forum_topic_hidden): Message
    {
        $this->general_forum_topic_hidden = $general_forum_topic_hidden;
        return $this;
    }

    public function getGeneralForumTopicUnhidden(): ?GeneralForumTopicUnhidden
    {
        return $this->general_forum_topic_unhidden;
    }

    public function setGeneralForumTopicUnhidden(?GeneralForumTopicUnhidden $general_forum_topic_unhidden): Message
    {
        $this->general_forum_topic_unhidden = $general_forum_topic_unhidden;
        return $this;
    }

    public function getVideoChatScheduled(): ?VideoChatScheduled
    {
        return $this->video_chat_scheduled;
    }

    public function setVideoChatScheduled(?VideoChatScheduled $video_chat_scheduled): Message
    {
        $this->video_chat_scheduled = $video_chat_scheduled;
        return $this;
    }

    public function getVideoChatStarted(): ?VideoChatStarted
    {
        return $this->video_chat_started;
    }

    public function setVideoChatStarted(?VideoChatStarted $video_chat_started): Message
    {
        $this->video_chat_started = $video_chat_started;
        return $this;
    }

    public function getVideoChatEnded(): ?VideoChatEnded
    {
        return $this->video_chat_ended;
    }

    public function setVideoChatEnded(?VideoChatEnded $video_chat_ended): Message
    {
        $this->video_chat_ended = $video_chat_ended;
        return $this;
    }

    public function getVideoChatParticipantsInvited(): ?VideoChatParticipantsInvited
    {
        return $this->video_chat_participants_invited;
    }

    public function setVideoChatParticipantsInvited(?VideoChatParticipantsInvited $video_chat_participants_invited): Message
    {
        $this->video_chat_participants_invited = $video_chat_participants_invited;
        return $this;
    }

    public function getWebAppData(): ?WebAppData
    {
        return $this->web_app_data;
    }

    public function setWebAppData(?WebAppData $web_app_data): Message
    {
        $this->web_app_data = $web_app_data;
        return $this;
    }

    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->reply_markup;
    }

    public function setReplyMarkup(?InlineKeyboardMarkup $reply_markup): Message
    {
        $this->reply_markup = $reply_markup;
        return $this;
    }
}