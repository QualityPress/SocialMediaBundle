<?php

namespace QualityPress\Bundle\SocialMediaBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use QualityPress\Bundle\SocialMediaBundle\Model\SocialMediaInterface;

/**
 * SocialMediaListener
 * 
 * @copyright (c) 2013, Quality Press
 * @author Jorge Vahldick <jvahldick@gmail.com>
 */
class SocialMediaListener
{
    
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        
        if ($entity instanceof SocialMediaInterface) {
            $entity->setCreatedAt(new \DateTime('now'));
        }
    }
    
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        
        if ($entity instanceof SocialMediaInterface) {
            $entity
                ->setUpdatedAt(new \DateTime('now'))
                ->setCreatedAt(new \DateTime('now'))
            ;
        }
    }
    
}