<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle\ChatCommand;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @return bool
     * @throws AlexaCoreException
     */
    abstract protected function createResponse(): bool;

    /**
     * {@inheritdoc}
     * @see ChatCommandInterface::execute()
     */
    final public function execute(): void
    {
        $this->createResponse();
    }

    /**
     * {@inheritdoc}
     * @see ChatCommandInterface::isValidForRequest()
     */
    public function isValidForRequest(Update $request): bool
    {
        $chatCommandName = $request->getMessage()->getText();

        return $this->isValidByName($chatCommandName);
    }

    /**
     * {@inheritdoc}
     * @see ChatCommandInterface::isValidByName()
     */
    public function isValidByName(string $chatCommandName): bool
    {
        return (
            in_array($chatCommandName, static::VALID_CHAT_COMMANDS) ||
            $this->getShortClassName() === $chatCommandName
        );
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

//    /**
//     * @return AlexaRequest
//     * @throws AlexaCoreException
//     */
//    protected function getAlexaRequest(): AlexaRequest
//    {
//        return $this->getManager()->getAlexaRequest();
//    }
//
//    /**
//     * @return AlexaResponse
//     * @throws AlexaCoreException
//     */
//    protected function getAlexaResponse(): AlexaResponse
//    {
//        return $this->getManager()->getAlexaResponse();
//    }

    /**
     * @return string
     */
    protected function getShortClassName(): string
    {
        $className = static::class;
        $pos = strrpos($className, '\\');
        return substr($className, $pos + 1);
    }

}