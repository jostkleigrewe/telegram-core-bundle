<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand;

/**
 * Class ChatCommandChain
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class ChatCommandChain
{
    private array $chatCommands;

    public function __construct()
    {
        $this->chatCommands = [];
    }

    public function addChatCommand(ChatCommandInterface $chatCommand): static
    {
        $this->chatCommands[] = $chatCommand;

        return $this;
    }

     public function getChatCommands(): array
    {
        return $this->chatCommands;
    }
}