<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Responses;

use Jostkleigrewe\TelegramCoreBundle\Dto\Core\Message;

class MessageResponse
{
    public function __construct(
        private bool $ok,
        private Message $result
    )
    {
    }

    public function isOk(): bool
    {
        return $this->ok;
    }

    public function getResult(): Message
    {
        return $this->result;
    }
}