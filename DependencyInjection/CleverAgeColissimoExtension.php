<?php

namespace CleverAge\ColissimoBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class CleverAgeColissimoExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $config = $this->processConfiguration(new Configuration(), $configs);
        $container->setParameter('cleverage_colissimo.testModeEnabled', $config['testModeEnabled']);
        $container->setParameter('cleverage_colissimo.auth', $config['auth']);
        $container->setParameter('cleverage_colissimo.letter.service', $config['letter']['service']);
        $container->setParameter('cleverage_colissimo.letter.sender', $config['letter']['sender']);
    }

    public function prepend(ContainerBuilder $container): void {}
}
