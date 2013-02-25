<?php

namespace QualityPress\Bundle\SocialMediaBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * SocialMediaController
 * 
 * @copyright (c) 2013, Quality Press
 * @author Jorge Vahldick <jvahldick@gmail.com>
 */
class SocialMediaController
{
    
    protected $container;
    protected $defaultTemplate;
    protected $limit = 5;
    
    public function __construct(ContainerInterface $container, $defaultTemplate)
    {
        $this->container = $container;
        $this->defaultTemplate = $defaultTemplate;
    }
    
    public function listAction($theme = null, $limit = null)
    {
        $limit      = (null === $limit || false === is_numeric($limit)) ? $this->getLimit() : $limit;
        $theme      = (null === $theme) ? $this->defaultTemplate : $theme;
        
        $manager    = $this->container->get('qualitypress.social_media.manager');
        $result     = $manager->findBy(array('enabled' => true), $limit);
        
        $engine     = $this->getTemplating();
        $content    = $engine->stream($theme, array('result' => $result));
        
        return $content;
    }
    
    /**
     * @return \Symfony\Bundle\TwigBundle\TwigEngine
     */
    protected function getTemplating()
    {
        return $this->container->get('templating');
    }
    
    protected function getLimit()
    {
        $this->limit;
    }
    
}