<?php

namespace QualityPress\Bundle\SocialMediaBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class QualityPressSocialMediaExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        // Data manager
        if (isset($config['entity_manager'])) {
            $container->setParameter('qualitypress.social_media.entity_manager', $config['entity_manager']);
        }
        
        // Classes
        $classes = isset($config['entities']) ? $config['entities'] : array();
        $this->loadEntities($container, $classes);
        
        // View
        $container->setParameter('qualitypress.social_media.theme.view', $config['defaultTemplate']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('configuration.xml');
        $loader->load('services.xml');
    }
    
    protected function loadEntities(ContainerBuilder $container, $parameters)
    {
        foreach ($parameters as $key => $value) {
            $container->setParameter('qualitypress.social_media.class.' . $key, $value);
        }
    }
    
}