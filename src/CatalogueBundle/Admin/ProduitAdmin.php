<?php

namespace CatalogueBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProduitAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('isActive')
            ->add('price')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('isActive')
            ->add('description')
            ->add('price')
            ->add('categories')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Produit',array('class'=>'col-md-9'))
                ->add('name')
                ->add('isActive')
                ->add('description')
                ->add('price')
                ->add('imageFile', 'file', array(
                  'required'=>false
                )) 
            ->end() 
            ->with('Categorie',array('class'=>'col-md-3'))       
                ->add('categories','sonata_type_model',array('expanded'=>true, 'multiple'=>true))
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('isActive')
            ->add('description')
            ->add('price')
            ->add('imageName')
            ->add('updatedAt')
        ;
    }
}
