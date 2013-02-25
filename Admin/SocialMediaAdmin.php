<?php

namespace QualityPress\Bundle\SocialMediaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;

/**
 * SocialMediaAdmin
 * 
 * @copyright (c) 2013, Quality Press
 * @author Jorge Vahldick <jvahldick@gmail.com>
 */
class SocialMediaAdmin extends Admin
{
    
    protected function configureListFields(\Sonata\AdminBundle\Datagrid\ListMapper $list)
    {
        $list
            ->addIdentifier('name')
            ->add('link')
            ->add('enabled', 'boolean', array('editable' => true))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view'      => array(),
                    'edit'      => array(),
                    'delete'    => array(),
                )
            ))
        ;
    }
    
    protected function configureFormFields(\Sonata\AdminBundle\Form\FormMapper $form)
    {
        $object = $this->getSubject();
        $imageRequired = (false === $object->getImage() instanceof \Sonata\MediaBundle\Model\MediaInterface);
                
        $form
            ->with('label.general_info')
                ->add('name')
                ->add('link', 'url')
                ->add('image', 'sonata_media_type', array(
                    'required'  => $imageRequired, 
                    'provider'  => 'sonata.media.provider.image',
                    'context'   => 'midias_sociais',
                    'label'     => 'admin.label.image'
                ), array(
                    'required' => true
                ))
                ->add('target', 'choice', array(
                    'choices' => $this->getSubject()->getTargetOptions()
                ))
                ->add('enabled', 'choice', array(
                    'choices' => array(
                        0 => 'Não',
                        1 => 'Sim'
                    )
                ))
            ->end()
        ;
    }
    
}