<?php

namespace QualityPress\Bundle\SocialMediaBundle\Manager;

use QualityPress\Bundle\SocialMediaBundle\Model\SocialMediaInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;

/**
 * SocialMediaManagerInterface
 * 
 * @copyright (c) 2013, Quality Press
 * @author Jorge Vahldick <jvahldick@gmail.com>
 */
interface SocialMediaManagerInterface
{
    
    /**
     * @return EntityManager
     */
    function getEntityManager();
    
    /**
     * @return EntityRepository
     */
    function getRepository();
    
    /**
     * @return SocialMediaInterface
     */
    function create();
    
    /**
     * Get entity class name
     * @return string
     */
    function getClass();
    
    /**
     * Get social media objects
     * @return array|null
     */
    function findAll();
    
    /**
     * Find object´s
     * @param array $params
     * @return array|null
     */
    function findBy(array $params, $limit);
    
    /**
     * Remove an object
     * 
     * @param SocialMediaManagerInterface $object
     * @param boolean $flush
     */
    function remove(SocialMediaInterface $object, $flush = true);
    
    /**
     * Update an object
     * 
     * @param SocialMediaManagerInterface $object
     * @param boolean $flush
     */
    function update(SocialMediaInterface $object, $flush = true);
    
    /**
     * Find one by defined parameters
     * @return SocialMediaManagerInterface|null
     */
    function findOneBy(array $params = array());
    
}
