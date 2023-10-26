<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests;


/**
 * @link https://core.telegram.org/bots/api#sendmessage
 */
class SendMessage extends AbstractRequest
{

    private string $text;

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getUrl() : string{
        return 'sendMessage';
    }

    protected function getJson() : ?array
    {
        return [
            'chat_id' => $this->getChatId(),
            'text' => $this->text,
        ];
    }

    protected function getHeaders() : ?array
    {
        return NULL;
    }

}