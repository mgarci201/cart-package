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
    	->add('packageNameType', 'choice', array(
    		'class' => 'AppBundle:Package_Type',
    		
    		 ));
    }

     /**
     * @param OptionsResolverInterface $resolver
     */
     public function getDefaultOptions(array $options)
     {
     	return array(
     		'data_class' => 'AppBundle\Entity\Package_Type');
     }

   	/**
     * @return string
     */
   	public function getName()
   	{
   		return 'choose_package';
   	}

}