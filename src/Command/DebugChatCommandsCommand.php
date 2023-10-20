<?php

namespace Jostkleigrewe\TelegramCoreBundle\Command;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\ChatCommandCollection;
use Jostkleigrewe\TelegramCoreBundle\Manager\TelegramCoreManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class DebugChatCommandsCommand
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class DebugChatCommandsCommand extends Command
{
    protected static $defaultName = 'telegram:debug:chat-commands';

    public function __construct(
        private readonly TelegramCoreManager $manager
    )
    {
        parent::__construct();
    }

    /**
     * configure
     */
    protected function configure()
    {
        $this
            ->setDescription('Show all chat-commands that are registered')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        echo __METHOD__ . PHP_EOL;
        
        foreach ($this->manager->getChatCommmandService()->getChatCommandCollection()->yieldHandlers() as $handler) {
            $io->comment('- ' . get_class($handler));

        }

        return Command::SUCCESS;
    }
}
