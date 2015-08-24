<?php

namespace AppBundle\Form\ChoosePackage;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChoosePackage extends AbstractType 
{
	 /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
     public function buildForm(FormBuilderInterface $builder, array $options)
     {
     	$builder
     		->add('package_type', 'choice', array(
     		'choices' => 'AppBundle:Package_Type',
     		'required' => false,
     		));
     }

	 /**
     * @param OptionsResolverInterface $resolver
     */   
     public function setDefaultOptions(OptionsResolverInterface $resolver)
     {
     	$resolver->setDefaults(array(
     		'data_class' => 'AppBundle\Entity\Package_Type',
     		));
     }  

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_choose_package';
    }     

}
