<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests;


/**
 * @link https://core.telegram.org/bots/api#sendmessage
 * 
 * Example:
 */
class SendMessage extends AbstractRequest
{
    public function __construct(
        private int    $chatId,
        private string $text,
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
        ];
    }
}