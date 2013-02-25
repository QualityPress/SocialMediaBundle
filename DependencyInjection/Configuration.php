<?php

namespace QualityPress\Bundle\SocialMediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('quality_press_social_media');
        
        $rootNode
            ->children()
                ->scalarNode('entity_manager')
                    ->defaultValue('default')
                ->end()
                
                ->arrayNode('entities')
                    ->children()
                        ->scalarNode('frontend')
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('backend')
                            ->defaultValue('QualityPress\Bundle\SocialMediaBundle\Admin\SocialMediaAdmin')
                        ->end()
                        ->scalarNode('manager')
                            ->defaultValue('QualityPress\Bundle\SocialMediaBundle\Manager\SocialMediaManager')
                        ->end()
                        ->scalarNode('extension')
                            ->defaultValue('QualityPress\Bundle\SocialMediaBundle\Twig\SocialMediaExtension')
                        ->end()
                        ->scalarNode('controller')
                            ->defaultValue('QualityPress\Bundle\SocialMediaBundle\Controller\SocialMediaController')
                        ->end()
                    ->end()
                ->end()
                
                ->scalarNode('defaultTemplate')
                    ->defaultValue('QualityPressSocialMediaBundle:CRUD:list.html.twig')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
