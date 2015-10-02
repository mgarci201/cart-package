<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class Package_TypeType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('packagetype', 'entity', array(
                'empty_value' => '-Select Package Type-',
                'class' => 'AppBundle:Package_Type',
                'choice_label' => 'packageNameType',
                'property' => 'package'
                ))

            ->add('packageNameType')
            ->add('package')
            
            ->add('save', 'submit');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Package_Type'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_package_type';
    }
}
