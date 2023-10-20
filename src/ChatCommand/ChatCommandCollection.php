<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand;

/**
 * Class ChatCommandCollection
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class ChatCommandCollection
{

    /**
     * @var iterable $handlers
     */
    private iterable $handlers;

    /**
     * ChatCommandCollection constructor.
     *
     * @param iterable $handlers
     */
    public function __construct(iterable $handlers)
    {
        $this->handlers = $handlers;
    }

    /**
     * @return iterable
     */
    public function getHandlers(): iterable
    {
        return $this->handlers;
    }

    /**
     * @return iterable
     */
    public function yieldHandlers(): iterable
    {
        foreach ($this->handlers as $handler) {
            yield $handler;
        }
    }
}