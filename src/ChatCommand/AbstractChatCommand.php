<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand;

use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Response\UpdateResponse;
use Jostkleigrewe\TelegramCoreBundle\Exception\ChatCommandLogicException;
use Jostkleigrewe\TelegramCoreBundle\Manager\TelegramCoreManager;
use Exception;

/**
 * Class AbstractChatCommand
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
abstract class AbstractChatCommand  implements ChatCommandInterface
{
    public const IS_FALLBACK = false;

    public function __construct(
        private readonly TelegramCoreManager $manager,
    ) {
    }

    /**
     * {@inheritdoc}
     * @see ChatCommandInterface::isValid()
     */
    abstract public function isValid(UpdateRequest $updateRequest): bool;

    /**
     * @param UpdateRequest $updateRequest
     * @return UpdateResponse
     */
    abstract protected function createResponse(UpdateRequest $updateRequest): UpdateResponse;

    /**
     * {@inheritdoc}
     * @see ChatCommandInterface::process()
     */
    public function process(UpdateRequest $updateRequest): UpdateResponse
    {
        if (!$this->isValid($updateRequest)) {
            throw new ChatCommandLogicException('ChatCommand is not valid: '. static::class);
        }

        return $this->createResponse($updateRequest);
    }

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