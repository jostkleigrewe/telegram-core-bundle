<?php
declare(strict_types = 1);

namespace Jostkleigrewe\TelegramCoreBundle;

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

/**
 * JostkleigreweTelegramCoreBundle
 *
 * @package   Jostkleigrewe\TelegramCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 * @see https://symfony.com/blog/new-in-symfony-6-1-simpler-bundle-extension-and-configuration
 */
class JostkleigreweTelegramCoreBundle extends AbstractBundle
{
    //  The root key of your bundle configuration is automatically determined
    //  from your bundle name (for FooBundle it would be foo). If you want to
    //  change it, now you can simply define the following property
    //    protected string $extensionAlias = 'acme';

    /**
     * This method can be overridden to register compilation passes,
     * other extensions, ...
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
    }

    /**
     * New possibility to configure the bundle (since Symfony 6.1)
     *
     */
    public function configure(DefinitionConfigurator $definition): void
    {
        // loads config definition from a file
//        $definition->import('../config/definition.php');

        // loads config definition from multiple files (when it's too long you can split it)
//        $definition->import('../config/definition/*.php');

        // if the configuration is short, consider adding it in this class
        $definition->rootNode()
            ->children()
                ->scalarNode('apikey')
                    ->defaultValue('bar')
                    ->isRequired()
                    ->info('Telegram API Key')
                ->end()
            ->end()
        ;
    }

    /**
     *  $config is the bundle Configuration that you usually process in
     *  ExtensionInterface::load() but already merged and processed
     */
    public function loadExtension(
        array $config,
        ContainerConfigurator $container,
        ContainerBuilder $builder): void
    {
        $container->import('../config/services.yaml');
    }

    /**
     * This directory structure requires to configure the bundle path to its root directory
     */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}