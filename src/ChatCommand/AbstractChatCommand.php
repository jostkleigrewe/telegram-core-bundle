<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Jostkleigrewe\TelegramCoreBundle\Dto\Request\UpdateRequest;
use Jostkleigrewe\TelegramCoreBundle\Dto\Response\UpdateResponse;
use Jostkleigrewe\TelegramCoreBundle\Dto\Webhook\Update;
use Jostkleigrewe\TelegramCoreBundle\Exception\ChatCommandLogicException;
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
            throw new ChatCommandLogicException('ChatCommand is not valid');
        }

        try {
            $updateResponse = $this->createResponse($updateRequest);
        } catch (\Exception $e) {
            $updateResponse = new UpdateResponse(
                500,
                'ChatCommand could not be processed',
                $updateRequest,
                $e);
        }

        return $updateResponse;
    }

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