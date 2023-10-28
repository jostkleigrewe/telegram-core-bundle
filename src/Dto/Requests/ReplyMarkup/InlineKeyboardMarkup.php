<?php

namespace Jostkleigrewe\TelegramCoreBundle\Dto\Requests\ReplyMarkup;

use Jostkleigrewe\TelegramCoreBundle\Dto\Requests\Types\InlineKeyboardButton;

class InlineKeyboardMarkup implements ReplyMarkupInterface
{

    /**
     * This object represents an inline keyboard that appears right next to the message it belongs to.
     *
     * @link    https://core.telegram.org/bots/api#inlinekeyboardmarkup
     */

    /**
     * @param array[] $inline_keyboard
     */
    public function __construct(
        public array $inline_keyboard = [],
    )
    {
    }

    public function addButton(InlineKeyboardButton $inlineKeyboardButton, int $rowNumber = 0): static
    {
        if (!isset($this->inline_keyboard[$rowNumber]) ||
            !is_array($this->inline_keyboard[$rowNumber])) {
            $this->inline_keyboard[$rowNumber] = [];
        }
        $this->inline_keyboard[$rowNumber][] = $inlineKeyboardButton;

        return $this;
    }
}