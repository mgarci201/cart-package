<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SelectPackageType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function buildForm(FormBuilderInterface $builder, array $options) {
    	$builder->add('date_created', DateType::class, array(
			'widget' => 'single_text',
			'format' => 'yyyy-MM-dd',
			));
    }

}