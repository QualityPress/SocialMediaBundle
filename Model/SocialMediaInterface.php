<?php

namespace QualityPress\Bundle\SocialMediaBundle\Model;

/**
 * SocialMediaInterface
 * 
 * @copyright (c) 2013, Quality Press
 * @author Jorge Vahldick <jvahldick@gmail.com>
 */
interface SocialMediaInterface
{
    
    /**
     * Set name
     * 
     * @param string $name
     * @return self
     */
    function setName($name);
    
    /**
     * Get name
     * 
     * @return string
     */
    function getName();
    
    /**
     * Set image
     * 
     * @param \Sonata\MediaBundle\Model\MediaInterface $image
     * @return self
     */
    function setImage(\Sonata\MediaBundle\Model\MediaInterface $image);
    
    /**
     * Get image media
     * 
     * @return \Sonata\MediaBundle\Model\MediaInterfac
     */
    function getImage();
    
    /**
     * Set link
     * 
     * @param type $url
     * @return self
     */
    function setLink($url);
    
    /**
     * Get link
     * 
     * @return string
     */
    function getLink();
    
    /**
     * Set target
     * 
     * @param string $target
     * @return self
     */
    function setTarget($target);
    
    /**
     * Get target
     * 
     * @return string
     */
    function getTarget();
    
    /**
     * Get options of target
     * 
     * @return array
     */
    function getTargetOptions();
    
    /**
     * @return boolean
     */
    function isEnabled();
    
    /**
     * @param boolean $boolean
     * @return self
     */
    function setEnabled($boolean);
    
}