<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Response\UpdateResponse;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\Update;
use Jostkleigrewe\TelegramCoreBundle\Manager\TelegramCoreManager;

/**
 * Class AbstractChatCommand
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
abstract class AbstractChatCommand  implements ChatCommandInterface
{
    public const VALID_CHAT_COMMANDS = [];
    public const IS_FALLBACK = false;
    
    /**
     * AbstractChatCommand constructor.
     *
     * @param TelegramCoreManager $manager
     */
    public function __construct(
        private readonly TelegramCoreManager $manager,
    ) {
    }

    /**
     * {@inheritdoc}
     * @see ChatCommandInterface::createResponse()
     */
    abstract public function createResponse(UpdateRequest $updateRequest): UpdateResponse;

    /**
     * {@inheritdoc}
     * @see ChatCommandInterface::isValid()
     */
    abstract public function isValid(UpdateRequest $updateRequest): bool;

    /**
     * {@inheritdoc}
     * @see ChatCommandInterface::isFallback()
     */
    public function isFallback(): bool
    {
        return static::IS_FALLBACK;
    }

    /**
     * @return TelegramCoreManager
     */
    protected  function getManager(): TelegramCoreManager
    {
        return $this->manager;
    }
}