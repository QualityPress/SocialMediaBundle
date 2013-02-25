<?php

namespace QualityPress\Bundle\SocialMediaBundle\Twig;

use QualityPress\Bundle\SocialMediaBundle\Controller\SocialMediaController;

/**
 * SocialMediaExtension
 * 
 * @copyright (c) 2013, Quality Press
 * @author Jorge Vahldick <jvahldick@gmail.com>
 */
class SocialMediaExtension extends \Twig_Extension
{
    
    protected $controller;
    
    /**
     * __construct()
     * 
     * @param \QualityPress\Bundle\SocialMediaBundle\Controller\SocialMediaController $controller
     */
    function __construct(SocialMediaController $controller)
    {
        $this->controller = $controller;
    }
    
    public function getName()
    {
        return 'qualitypress_sm_extension';
    }

    public function getFunctions()
    {
        return array(
            'qp_list_social_medias' => new \Twig_Function_Method($this, 'renderSocialMedias'),
        );
    }
    
    public function renderSocialMedias($theme = null, $limit = null)
    {
        return $this->controller->listAction($theme, $limit);
    }
    
}