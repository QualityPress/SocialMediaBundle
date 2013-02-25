<?php

namespace QualityPress\Bundle\SocialMediaBundle\Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use QualityPress\Bundle\SocialMediaBundle\Model\SocialMediaInterface;

/**
 * SocialMediaManager
 * 
 * @copyright (c) 2013, Quality Press
 * @author Jorge Vahldick <jvahldick@gmail.com>
 */
class SocialMediaManager implements SocialMediaManagerInterface
{
    
    /**
     * @var EntityManager 
     */
    protected $em;
    
    /**
     * @var EntityRepository
     */
    protected $repository;
    
    /**
     * @var string
     */
    protected $class;
    
    function __construct(EntityManager $em, $class)
    {
        $this->class = $class;
        $this->em = $em;
        $this->repository = $this->em->getRepository($this->getClass());
    }
    
    public function create()
    {
        $class = $this->getClass();
        return new $class;
    }
    
    public function getClass()
    {
        return $this->class;
    }
    
    public function getRepository()
    {
        return $this->repository;
    }
    
    public function getEntityManager()
    {
        return $this->em;
    }
    
    public function findBy(array $params, $limit = 5)
    {
        return $this->getRepository()->findBy($params, null, $limit);
    }
    
    public function findAll()
    {
        return $this->getRepository()->findAll();
    }
    
    public function findOneBy(array $params = array())
    {
        $repository = $this->getRepository();
        $query      = $repository
            ->createQueryBuilder('sm')
            ->setParameters($params)
            ->getQuery()
        ;
        
        return $query->getOneOrNullResult();
    }
    
    public function remove(SocialMediaInterface $object, $flush = true)
    {
        $em = $this->getEntityManager();
        $em->remove($object);
        
        if (true === $flush) {
            $em->flush();
        }
    }
    
    public function update(SocialMediaInterface $object, $flush = true)
    {
        $em = $this->getEntityManager();
        $em->persist($object);
        
        if (true === $flush) {
            $em->flush();
        }
    }

}