<?php 

namespace AppBundle\Form\DropdownPackageType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DropdownPackageType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder
    	->add('packageNameType', 'entity', array('class' => 'AppBundle\Entity\Package_Type', 
    		'choices' => $this->getPackageNameType() 
    		));
    }

}