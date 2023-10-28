<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests;


use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message\MessageEntity;
use Jostkleigrewe\TelegramCoreBundle\Dto\Requests\ReplyMarkup\ReplyMarkupInterface;

/**
 * Use this to send text messages
 *
 * @link https://core.telegram.org/bots/api#sendmessage
 */
class SendMessage extends AbstractRequest
{

    public function __construct(
        private readonly int|string $chatId,
        private readonly string $text,
        private readonly ?int $message_thread_id = null,
        private readonly ?string $parse_mode = null,
        private ?array $entities = null,
        private readonly ?bool $disable_web_page_preview = null,
        private readonly ?bool $disable_notification = null,
        private readonly ?bool $protect_content = null,
        private readonly ?int $reply_to_message_id = null,
        private readonly ?bool $allow_sending_without_reply = null,
        private readonly ?ReplyMarkupInterface $reply_markup = null,
    )
    {
        parent::__construct();
    }

    public function getUrl() : string
    {
        return 'sendMessage';
    }

    protected function getJson() : ?array
    {
        return [
            'chat_id' => $this->chatId,
            'text' => $this->text,
            'message_thread_id' => $this->message_thread_id,
            'parse_mode' => $this->parse_mode,
            'entities' => $this->getEntities(),
            'disable_web_page_preview' => $this->disable_web_page_preview,
            'disable_notification' => $this->disable_notification,
            'protect_content' => $this->protect_content,
            'reply_to_message_id' => $this->reply_to_message_id,
            'allow_sending_without_reply' => $this->allow_sending_without_reply,
            'reply_markup' => $this->getReplyMarkup(),
        ];
    }


    public function addEntity(MessageEntity $messageEntity): static
    {
        if (!is_array($this->entities)) {
            $this->entities = [];
        }

        $this->entities[] = $messageEntity;

        return $this;
    }

    protected function getEntities(): ?string
    {
        if (empty($this->entities)) {
            return null;
        }

        return json_encode($this->entities);
    }

    protected function getReplyMarkup(): ?string
    {
        if (empty($this->reply_markup)) {
            return null;
        }

        return json_encode($this->reply_markup);
    }
}