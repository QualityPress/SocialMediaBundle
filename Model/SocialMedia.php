<?php

namespace QualityPress\Bundle\SocialMediaBundle\Model;

/**
 * SocialMedia
 * 
 * @copyright (c) 2013, Quality Press
 * @author Jorge Vahldick <jvahldick@gmail.com>
 */
abstract class SocialMedia implements SocialMediaInterface
{
    
    /**
     * @var string
     */
    protected $name;
    
    /**
     * @var \Sonata\MediaBundle\Model\MediaInterface
     */
    protected $image;
    
    /**
     * @var string
     */
    protected $link;
    
    /**
     * @var boolean
     */
    protected $enabled;
    
    /**
     * @var \DateTime
     */
    protected $createdAt;
    
    /**
     * @var \DateTime
     */
    protected $updatedAt;
    
    /**
     * @var string
     */
    protected $target;
    
    /**
     * @var array
     */
    protected $targetOptions = array(
        '_blank'    => 'label.target.blank',
        '_self'     => 'label.target.self',
        '_parent'   => 'label.target.parent',
        '_top'      => 'label.target.top',
    );
    
    function __construct()
    {
        $this->enabled = true;
    }
    
    public function getImage()
    {
        return $this->image;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function getTargetOptions()
    {
        return $this->targetOptions;
    }

    public function setImage(\Sonata\MediaBundle\Model\MediaInterface $image)
    {
        $this->image = $image;
    }

    public function setLink($url)
    {
        $this->link = $url;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setTarget($target)
    {
        $this->target = $target;
    }
    
    public function isEnabled()
    {
        return $this->enabled;
    }

    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    
    public function __toString()
    {
        return $this->getName();
    }

}