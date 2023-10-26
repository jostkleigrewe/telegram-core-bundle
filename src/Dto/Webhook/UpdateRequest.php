<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Webhook;

use Jostkleigrewe\TelegramCoreBundle\Dto\Core\CallbackQuery;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ChatJoinRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ChatMemberUpdated;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ChosenInlineResult;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\InlineQuery;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\Poll;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\PollAnswer;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\PreCheckoutQuery;
use Jostkleigrewe\TelegramCoreBundle\Dto\Core\ShippingQuery;

/**
 * This class is defined to encapsulate the data of a Telegram webhook request.
 */
class UpdateRequest
{

    /**
     * The update's unique identifier. Update identifiers start from a certain positive number
     * and increase sequentially. This ID becomes especially handy if you're using Webhooks,
     * since it allows you to ignore repeated updates or to restore the correct update sequence,
     * should they get out of order.
     *
     * @var int $update_id
     */
    public int $update_id;

    /**
     * New incoming message of any kind - text, photo, sticker, etc.
     *
     * @var Message|null $message
     */
    public ?Message $message = null;

    /**
     * New version of a message that is known to the bot and was edited
     *
     * @var Message|null $edited_message
     */
    public ?Message $edited_message = null;

    /**
     * New incoming channel post of any kind - text, photo, sticker, etc.
     *
     * @var Message|null $channel_post
     */
    public ?Message $channel_post = null;

    /**
     * New version of a channel post that is known to the bot and was edited
     *
     * @var Message|null $edited_channel_post
     */
    public ?Message $edited_channel_post = null;

    /**
     * New incoming inline query
     *
     * @var InlineQuery|null $inline_query
     */
    public ?InlineQuery $inline_query = null;

    /**
     * The result of an inline query that was chosen by a user and sent to their chat partner.
     *
     * @var ChosenInlineResult|null $chosen_inline_result
     */
    public ?ChosenInlineResult $chosen_inline_result = null;

    /**
     * New incoming callback query
     *
     * @var CallbackQuery|null $callback_query
     */
    public ?CallbackQuery $callback_query = null;

    /**
     * New incoming shipping query. Only for invoices with flexible price
     *
     * @var ShippingQuery|null $shipping_query
     */
    public ?ShippingQuery $shipping_query = null;

    /**
     * New incoming pre-checkout query. Contains full information about checkout
     *
     * @var PreCheckoutQuery|null $pre_checkout_query
     */
    public ?PreCheckoutQuery $pre_checkout_query = null;

    /**
     * New poll state. Bots receive only updates about stopped polls and polls,
     * which are sent by the bot
     *
     * @var Poll|null $poll
     */
    public ?Poll $poll = null;

    /**
     * A user changed their answer in a non-anonymous poll.
     * Bots receive new votes only in polls that were sent by the bot itself.
     *
     * @var PollAnswer|null $poll_answer
     */
    public ?PollAnswer $poll_answer = null;

    /**
     * The bot's chat member status was updated in a chat.
     * For private chats, this update is received only when the bot is blocked
     * or unblocked by the user.
     *
     * @var ChatMemberUpdated|null $my_chat_member
     */
    public ?ChatMemberUpdated $my_chat_member = null;

    /**
     * The bot's chat member status was updated in a chat. For private chats,
     * this update is received only when the bot is blocked or unblocked by the user.
     *
     * @var ChatMemberUpdated|null $chat_member
     */
    public ?ChatMemberUpdated $chat_member = null;

    /**
     * A request to join the chat has been sent. The bot must have the can_invite_users
     * administrator right in the chat to receive these updates.
     *
     * @var ChatJoinRequest|null $chat_join_request
     */
    public ?ChatJoinRequest $chat_join_request = null;

    public function getUpdateId(): int
    {
        return $this->update_id;
    }

    public function setUpdateId(int $update_id): static
    {
        $this->update_id = $update_id;
        return $this;
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function setMessage(?Message $message): static
    {
        $this->message = $message;
        return $this;
    }

    public function getEditedMessage(): ?Message
    {
        return $this->edited_message;
    }

    public function setEditedMessage(?Message $edited_message): static
    {
        $this->edited_message = $edited_message;
        return $this;
    }

    public function getChannelPost(): ?Message
    {
        return $this->channel_post;
    }

    public function setChannelPost(?Message $channel_post): static
    {
        $this->channel_post = $channel_post;
        return $this;
    }

    public function getEditedChannelPost(): ?Message
    {
        return $this->edited_channel_post;
    }

    public function setEditedChannelPost(?Message $edited_channel_post): static
    {
        $this->edited_channel_post = $edited_channel_post;
        return $this;
    }

    public function getInlineQuery(): ?InlineQuery
    {
        return $this->inline_query;
    }

    public function setInlineQuery(?InlineQuery $inline_query): static
    {
        $this->inline_query = $inline_query;
        return $this;
    }

    public function getChosenInlineResult(): ?ChosenInlineResult
    {
        return $this->chosen_inline_result;
    }

    public function setChosenInlineResult(?ChosenInlineResult $chosen_inline_result): static
    {
        $this->chosen_inline_result = $chosen_inline_result;
        return $this;
    }

    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callback_query;
    }

    public function setCallbackQuery(?CallbackQuery $callback_query): static
    {
        $this->callback_query = $callback_query;
        return $this;
    }

    public function getShippingQuery(): ?ShippingQuery
    {
        return $this->shipping_query;
    }

    public function setShippingQuery(?ShippingQuery $shipping_query): static
    {
        $this->shipping_query = $shipping_query;
        return $this;
    }

    public function getPreCheckoutQuery(): ?PreCheckoutQuery
    {
        return $this->pre_checkout_query;
    }

    public function setPreCheckoutQuery(?PreCheckoutQuery $pre_checkout_query): static
    {
        $this->pre_checkout_query = $pre_checkout_query;
        return $this;
    }

    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    public function setPoll(?Poll $poll): static
    {
        $this->poll = $poll;
        return $this;
    }

    public function getPollAnswer(): ?PollAnswer
    {
        return $this->poll_answer;
    }

    public function setPollAnswer(?PollAnswer $poll_answer): static
    {
        $this->poll_answer = $poll_answer;
        return $this;
    }

    public function getMyChatMember(): ?ChatMemberUpdated
    {
        return $this->my_chat_member;
    }

    public function setMyChatMember(?ChatMemberUpdated $my_chat_member): static
    {
        $this->my_chat_member = $my_chat_member;
        return $this;
    }

    public function getChatMember(): ?ChatMemberUpdated
    {
        return $this->chat_member;
    }

    public function setChatMember(?ChatMemberUpdated $chat_member): static
    {
        $this->chat_member = $chat_member;
        return $this;
    }

    public function getChatJoinRequest(): ?ChatJoinRequest
    {
        return $this->chat_join_request;
    }

    public function setChatJoinRequest(?ChatJoinRequest $chat_join_request): static
    {
        $this->chat_join_request = $chat_join_request;
        return $this;
    }
}
