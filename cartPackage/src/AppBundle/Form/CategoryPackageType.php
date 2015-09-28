<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use AppBundle\Entity\Package_Type;

class CategoryPackageType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('package_type', 'entity', array(
				'class' => 'AppBundle:Package_Type',
				'placeholder' => '',
				));
		;

		$formModifier = function (FormInterface $form, Package_Type $package_type = null)
		{
			$packages = null === $package_type ? array() : $package_type->getAvailablePackages();

			$form->add('package', 'entity', array(
					'class' => 'AppBundle:Package',
					'placeholder' => '',
					'choices' => $packages,
					));
		};

		$builder->addEventListener(
			FormEvents::PRE_SET_DATA,
			function (FormEvent $event) use ($formModifier) {

				//this would be my entity for packages
				$data = $event->getData();

				$formModifier($event->getForm(), $data->getPackageNameType());
			}
		);

		$builder->get('package_type')->addEventListener(
			FormEvents::POST_SUBMIT,
			function(FormEvent $event) use ($formModifier) {
            // It's important here to fetch $event->getForm()->getData(), as
            // $event->getData() will get you the client data (that is, the ID)
            $package_type = $event->getForm()->getData();

            // since we've added the listener to the child, we'll have to pass on
            // the parent to the callback functions!
            $formModifier($event->getForm()->getParent(), $package_type);            			
			}
		);
	}

}