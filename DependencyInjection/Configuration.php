<?php

namespace CleverAge\ColissimoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $builder = new TreeBuilder('clever_age_colissimo');

        $rootNode = $builder->getRootNode();
        $rootNode->children()
            ->scalarNode('testModeEnabled')->isRequired()->cannotBeEmpty()->end()
            ->arrayNode('auth')->isRequired()
                ->children()
                    ->scalarNode('contractNumber')->isRequired()->cannotBeEmpty()->end()
                    ->scalarNode('password')->isRequired()->cannotBeEmpty()->end()
                ->end()
            ->end()
            ->arrayNode('letter')->isRequired()
                ->children()
                    ->arrayNode('service')->isRequired()
                        ->children()
                            ->scalarNode('commercialName')->end()
                        ->end()
                    ->end()
                    ->arrayNode('sender')->isRequired()
                        ->children()
                            ->scalarNode('companyName')->end()
                            ->scalarNode('line0')->end()
                            ->scalarNode('line1')->end()
                            ->scalarNode('line2')->end()
                            ->scalarNode('line3')->end()
                            ->scalarNode('countryCode')->end()
                            ->scalarNode('zipCode')->end()
                            ->scalarNode('city')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $builder;
    }
}
