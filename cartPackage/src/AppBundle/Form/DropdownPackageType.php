<?php 

namespace AppBundle\Form\DropdownPackageType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DropdownPackageType extends AbstractType
{
	/**
     * @param FormBuilderInterface $builder
   	 * @param array $options
    */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder
    	->add('packageNameTtype') ;
    }

	/**
	 * @param OptionsResolverInterface $resolver
	 */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    	$resolver->setDefaultsOptions(array(
    		'data_class' => 'AppBundle\Entity\Package_Type'
    	));
    }

}