<?php
#src/Iphpsandbox/PhotoBundle/Admin/PhotoAdmin.php
namespace Iphpsandbox\PhotoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class PhotoAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        return $listMapper->addIdentifier('title')->add('date');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        return $formMapper->add('title')
             ->add('date')
            ->add('photo', 'iphp_file')
            ->add('imageUpload', 'file', array ('required' => false))
            ->add ('image','genemu_plain');
    }
}