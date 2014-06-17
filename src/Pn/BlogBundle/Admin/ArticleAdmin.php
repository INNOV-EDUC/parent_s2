<?php
/**
 * Created by PhpStorm.
 * User: romain
 * Date: 26/03/14
 * Time: 14:33
 */

// src/Pn/BlogBundle/Admin/ArticleAdmin.php

namespace Pn\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Pn\PnBundle\Entity\Job;

class ArticleAdmin extends Admin
{
    // setup the defaut sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'created_at'
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('title')
            ->add('category', null, array(
                'required'  => true,
            ))
            ->add('miniPresentation')
            ->add('presentation', 'genemu_tinymce', array(
                'attr' => array('class' => 'tinymce')
            ))
            ->add('onWelcomePage')
            ->add('is_activated')
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('category')
            ->add('onWelcomePage')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('category')
            ->add('miniPresentation')
            ->add('onWelcomePage')
            ->add('created_at')
            ->add('updated_at')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('category')
            ->add('miniPresentation')
            ->add('presentation')
            ->add('onWelcomePage')
            ->add('created_at')
            ->add('updated_at')
        ;
    }
}
