<?php

namespace Jostkleigrewe\TelegramCoreBundle\DependencyInjection\Compiler;

use Jostkleigrewe\TelegramCoreBundle\ChatCommand\ChatCommandChain;
use Jostkleigrewe\TelegramCoreBundle\Service\ChatCommandService;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ChatCommandPass
 * 
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class ChatCommandPass implements CompilerPassInterface
{

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container): void
    {
        
        // always first check if the primary service is defined
        if (!$container->has(ChatCommandChain::class)) {
            return;
        }

        $definition = $container->findDefinition(ChatCommandChain::class);

        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds(ChatCommandService::SERVICE_TAG);

        if (empty($taggedServices)) {
            return;
        }

        // add to the service
        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addChatCommand', array(new Reference($id)));
        }
    }
}
